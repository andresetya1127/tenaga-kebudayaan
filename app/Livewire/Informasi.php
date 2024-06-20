<?php

namespace App\Livewire;

use App\Models\Tbl_identitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class Informasi extends Component
{
    use WithFileUploads;

    #[Locked]
    public $data;

    public $foto_landing;
    public $logo;
    public $nama_web;
    public $kepala_dinas;
    public $no_kontak;
    public $website;
    public $email;
    public $facebook;
    public $instagram;
    public $tiktok;
    public $youtube;
    public $twiter;
    public $lokasi_map;
    public $alamat;
    public $sekapur_sirih;
    public $deskripsi;

    public $foto_kepala;
    public $status_sosmed;

    public function mount()
    {
        $this->data = Tbl_identitas::first();
        $this->logo = asset('storage/photos/logo-web/' . $this->data->logo);
        $this->foto_kepala = asset('storage/photos/logo-web/' . $this->data->foto_kepala);
        $this->foto_landing = asset('storage/photos/logo-web/' . $this->data->foto_landing);

        $this->fill($this->data->only(
            'nama_web',
            'kepala_dinas',
            'no_kontak',
            'website',
            'email',
            'facebook',
            'instagram',
            'tiktok',
            'youtube',
            'twiter',
            'lokasi_map',
            'alamat',
            'deskripsi',
            'status_sosmed',
            'sekapur_sirih'
        ));
    }


    public function render()
    {
        return view('livewire.informasi', [
            'page' => 'Pengaturan Informasi Website'
        ]);
    }

    public function setSosmed()
    {
        if ($this->status_sosmed == 1) {
            $this->status_sosmed = null;
        } else {
            $this->status_sosmed = 1;
        }
    }

    public function saveInformasi()
    {
        $data = $this->only(
            'nama_web',
            'no_kontak',
            'website',
            'kepala_dinas',
            'email',
            'facebook',
            'instagram',
            'tiktok',
            'youtube',
            'twiter',
            'status_sosmed',
            'sekapur_sirih'
        );


        $rule = [
            'nama_web' => 'required|min:3|max:100',
            'kepala_dinas' => 'max:100',
            'no_kontak' => 'max:13',
            'website' => 'max:100',
            'email' => 'max:100',
            'youtube' => 'max:100',
            'facebook' => 'max:100',
            'instagram' => 'max:100',
            'tiktok' => 'max:100',
            'twiter' => 'max:100',
        ];

        Validator::make($this->only([
            'nama_web',
            'no_kontak',
            'website',
            'email',
            'facebook',
            'instagram',
            'tiktok',
            'youtube',
            'twiter',
            'status_sosmed',
        ]), $rule);



        try {
            if ($this->logo instanceof \Illuminate\Http\UploadedFile) {
                $this->validate([
                    'logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
                ]);

                $filename =  'default-logo.' . $this->logo->getClientOriginalExtension();

                if (Storage::exists('public/photos/logo-web/' . $this->data->logo)) {
                    Storage::delete('public/photos/logo-web/' . $this->data->logo);
                }
                $this->logo->storeAs('public/photos/logo-web', $filename);

                $data['logo'] = $filename;
            }

            if ($this->foto_kepala instanceof \Illuminate\Http\UploadedFile) {

                $this->validate([
                    'foto_kepala' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
                ]);

                $kepalaName =  'kepala-dinas-pendidikan.' . $this->foto_kepala->getClientOriginalExtension();

                if (Storage::exists('public/photos/logo-web/' . $this->data->foto_kepala)) {
                    Storage::delete('public/photos/logo-web/' . $this->data->foto_kepala);
                }
                $this->foto_kepala->storeAs('public/photos/logo-web', $kepalaName);

                $data['foto_kepala'] = $kepalaName;
            }

            if ($this->foto_landing instanceof \Illuminate\Http\UploadedFile) {

                $this->validate([
                    'foto_landing' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
                ]);

                $foto_landing =  'landing-default.' . $this->foto_landing->getClientOriginalExtension();

                if (Storage::exists('public/photos/logo-web/' . $this->data->foto_landing)) {
                    Storage::delete('public/photos/logo-web/' . $this->data->foto_landing);
                }
                $this->foto_landing->storeAs('public/photos/logo-web', $foto_landing);

                $data['foto_landing'] = $foto_landing;
            }

            $this->data->update($data);

            $this->dispatch('sweat-alert', title: 'Informasi Website Berhasil Diubah.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }
}
