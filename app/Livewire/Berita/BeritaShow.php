<?php

namespace App\Livewire\Berita;

use App\Models\Tbl_berita;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BeritaShow extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Locked]
    public $news;

    public function mount($id)
    {
        $this->news = Tbl_berita::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.berita.berta-show');
    }


    public function reading()
    {
        $this->news->update([
            'views' => $this->news->views + 1
        ]);
    }
}
