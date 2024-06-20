<?php

namespace App\Livewire\Galeri;

use App\Models\Cagar_budaya_v2;
use App\Models\Tbl_berita;
use App\Models\tbl_galeri;
use App\Models\Tbl_karya_budaya;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_odcb;
use App\Models\Wbtb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Album extends Component
{
    use WithPagination;


    public $dataAlbum;
    public $modalEdit;
    public $imgUpload = [];

    #[Locked]
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $data = tbl_galeri::find($this->id);

        return view('livewire.galeri.album', [
            'page' => 'Galeri ',
            'galeri' => $data
        ]);
    }



    public function confirmDelete()
    {
        $data = tbl_galeri::findOrFail($this->id);

        try {
            foreach (explode('||', $data->foto) as $key) {
                Storage::delete('public/photos/' . $key);
            }

            $data->delete();
            redirect()->route('list.galeri');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('sweat-alert', title: 'Data Gagal Dihapus.', icon: 'error');
        }
    }
}
