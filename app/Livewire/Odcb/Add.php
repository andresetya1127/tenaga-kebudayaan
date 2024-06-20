<?php

namespace App\Livewire\Odcb;

use App\Livewire\Forms\Odcb;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{

    use WithFileUploads;
    public Odcb $form;
    public $kab;
    public $kec;
    public $desa;


    public function render()
    {
        $this->kab = Kabupaten::where('province_id', 52)->get();
        $this->kec = Kecamatan::where('regency_id', $this->form->kabupaten)->get();
        $this->desa = Desa::where('district_id', $this->form->kecamatan)->get();

        return view('livewire.odcb.add', [
            'page' => 'Pendataan Awal Cagar Budaya',
        ]);
    }


    public function updated()
    {
        if (empty($this->form->kabupaten)) {
            $this->form->reset('kecamatan', 'desa_kel');
        } elseif (empty($this->form->kecamatan)) {
            $this->form->reset('desa_kel');
        }
    }


    public function registerCagar()
    {
        sleep(2);

        $rule = ['nomor_cb',  'jenis_cb', 'nama_cagar', 'pendaftar'];

        $valid = Validator::make($this->form->all(), $this->form->rules($rule));

        if ($valid->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan isi form dengan benar.', icon: 'warning');
        }

        $valid->validate();


        $this->form->register();


        $this->dispatch('alert-confirm', title: 'Apakah anda ingin melengkapi data cagar?', icon: 'success', rute: route('edit.odcb', $this->form->id_odcb));
    }

    public function updatedFormFoto()
    {
        try {
            Validator::make($this->form->only('foto'), ['foto' =>  'required|file|mimes:jpg,jpeg,png,gif|max:2048',])->validated();

            array_push($this->form->imgPush, $this->form->foto);

            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }


    public function deleteImg($key)
    {
        unset($this->form->imgPush[$key]);

        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }
}
