<?php

namespace App\Livewire\CagarBudayaV2;

use App\Livewire\Forms\CagarBudayaV2;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public CagarBudayaV2 $form;

    public function render()
    {
        return view('livewire.cagar-budaya-v2.add', [
            'page' => 'Pendataan Awal Cagar Budaya',

        ]);
    }

    public function registerCagar()
    {
        sleep(2);

        $rule = ['foto', 'jenis_cb', 'nama_cagar', 'sifat_bangunan', 'priode_bangunan', 'gaya_arsitektur', 'fungsi_bangunan', 'bentuk_atap'];

        $valid = Validator::make($this->form->all(), $this->form->rules($rule));

        if ($valid->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan isi form dengan benar.', icon: 'warning');
        }


        $valid->validate();


        $this->form->register();


        $this->dispatch('alert-confirm', title: 'Apakah anda ingin melengkapi data cagar?', icon: 'success', rute: route('complete.cagar_budaya', $this->form->id_cagar));
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
