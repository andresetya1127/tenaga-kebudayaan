<?php

namespace App\Livewire\Berita;

use App\Models\Tbl_berita;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BertaAll extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public $populer;

    public function updatingPopuler()
    {
        $this->resetPage();
        $this->reset();
    }

    public function updatingSearch()
    {
        $this->resetPage();
        $this->reset('populer');
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        if ($this->populer) {
            $model = Tbl_berita::where('views', '>=', 50)->orderBy('views', 'DESC');
        } else {
            $model = new Tbl_berita;
        }

        if (!empty($this->search)) {
            $news = $model->where('title', 'like', '%' . $this->search . '%',)
                ->orWhere('tgl_upload', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $news = $model->paginate(10);
        }

        return view('livewire.berita.berta-all', [
            'news' => $news
        ]);
    }
}
