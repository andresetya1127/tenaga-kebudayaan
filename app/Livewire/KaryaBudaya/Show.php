<?php

namespace App\Livewire\KaryaBudaya;

use App\Livewire\Forms\KaryaBudaya;
use App\Models\Tbl_karya_budaya;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination, WithoutUrlPagination;

    public KaryaBudaya $form;


    public $search;
    public $filter;


    public function render()
    {

        $query = Tbl_karya_budaya::query();

        if ($this->search) {
            $data = $query->where(function ($query) {
                if (auth()->user()->role == 1) {
                    $query->where('status', 1);
                } else {
                    $query->where('id_user', '=', auth()->user()->id);
                }
            })->where(function ($q) {
                $q->whereAny(['nama_karya', 'nama_pencipta', 'jenis_karya'], 'like', '%' . $this->search . '%');
            })->latest()->paginate(10);
        } else {
            $data = $query->where(function ($query) {
                if (auth()->user()->role == 1) {
                    $query->where('status', 1);
                } else {
                    $query->where('id_user', '=', auth()->user()->id);
                }
            })->latest()->paginate(10);
        }

        return view('livewire.karya-budaya.show', [
            'page' => 'Data Karya Budaya',
            'data' => $data
        ]);
    }


    function confirmDelete($id)
    {
        try {
            $data = Tbl_karya_budaya::find($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
                $data->delete();
            } else {
                $data->delete();
            }

            $this->dispatch('sweat-alert', title: 'Data Karya Budaya Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Karya Budaya Gagal Dihapus.', icon: 'error');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function reSend($id)
    {
        try {
            Tbl_karya_budaya::find($id)->update([
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
