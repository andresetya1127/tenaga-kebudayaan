<?php

namespace App\Livewire\KaryaSeni;

use App\Models\Tbl_karya_seni;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search;
    public $filter;


    public function render()
    {
        $model = new Tbl_karya_seni();


        if ($this->search) {
            $data = $model->where(function ($query) {
                if (auth()->user()->role == 1) {
                    $query->where('status', 1);
                } else {
                    $query->where('id_user', '=', auth()->user()->id);
                }
            })->where(function ($q) {
                $q->whereAny(['judul', 'nama_pencipta', 'cabang_seni'], 'like', '%' . $this->search . '%');
            })->latest()->paginate(10);
        } else {
            $data = $model->where(function ($query) {
                if (auth()->user()->role == 1) {
                    $query->where('status', 1);
                } else {
                    $query->where('id_user', '=', auth()->user()->id);
                }
            })->latest()->paginate(10);
        }

        return view('livewire.karya-seni.show', [
            'page' => 'Data Karya Seni',
            'data' => $data
        ]);
    }


    function confirmDelete($id)
    {
        try {
            $data = Tbl_karya_seni::find($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
                $data->delete();
            } else {
                $data->delete();
            }

            $this->dispatch('sweat-alert', title: 'Data Karya Seni Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Karya Seni Gagal Dihapus.', icon: 'error');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function reSend($id)
    {
        try {
            Tbl_karya_seni::find($id)->update([
                'status' => 0
            ]);
            $this->dispatch('sweat-alert', title: 'Data karya budaya berhasil dikirim ulang.', icon: 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }




    public function pembugaran($param, $id)
    {
        redirect()->route('pembugaran.show', [$param, $id]);
    }
}
