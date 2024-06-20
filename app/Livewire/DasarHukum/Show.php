<?php

namespace App\Livewire\DasarHukum;

use App\Models\Tbl_dasar_hukum;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Locked]
    public $id_hukum;

    public $search;

    public $slideForm;

    #[Validate('required|min:5|max:200')]
    public $dasar_hukum;

    #[Validate('required|min:5|url:http,https')]
    public $link_file;

    public function render()
    {
        $model = new Tbl_dasar_hukum();

        if ($this->search) {
            $data = $model
                ->where('nama_dasar_hukum', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $data = $model->latest()->paginate(12);
        }

        return view('livewire.dasar-hukum.show', [
            'page' => 'Data Dasar Hukum',
            'data' => $data
        ]);
    }

    public function confirmDelete($id)
    {
        try {
            Tbl_dasar_hukum::find($id)->delete();
            $this->dispatch('sweat-alert', title: 'Dasar Hukum Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Dasar Hukum Gagal Dihapus.', icon: 'error');
        }
    }

    public function submitHukum()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $model = new Tbl_dasar_hukum();

            if ($this->id_hukum) {
                $model->find($this->id_hukum)->update([
                    'nama_dasar_hukum' => $this->dasar_hukum,
                    'link_file' => $this->link_file
                ]);

                $this->dispatch('sweat-alert', title: 'Dasar Hukum Berhasil Diubah.', icon: 'success');
            } else {
                $model->nama_dasar_hukum = $this->dasar_hukum;
                $model->link_file = $this->link_file;
                $model->save();

                $this->dispatch('sweat-alert', title: 'Dasar Hukum Berhasil Disimpan.', icon: 'success');
                $this->reset('dasar_hukum', 'link_file', 'id_hukum');
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Dasar Hukum Gagal Disimpan.', icon: 'error');
        }
    }


    function updatingSlideForm()
    {
        if (!$this->slideForm) {
            $this->reset('dasar_hukum', 'link_file', 'id_hukum');
        }
    }

    public function updateHukum($id)
    {
        $model = Tbl_dasar_hukum::find($id);
        $this->dasar_hukum = $model->nama_dasar_hukum;
        $this->link_file = $model->link_file;
        $this->slideForm = true;
        $this->id_hukum = $id;
    }
}
