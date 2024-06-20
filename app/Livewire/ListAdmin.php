<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListAdmin extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    #[Validate('required|max:100|alpha')]
    public $nama;
    #[Validate('required|in:L,P')]
    public $jenis_kelamin;
    #[Validate('required|min:16|max:16|unique:users,nik')]
    public $nik;
    #[Validate('required|max:13|unique:users,no_hp')]
    public $no_hp;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|image|mimes:jpeg,jpg,png,gif|max:2048')]
    public $foto;

    public function render()
    {
        return view('livewire.list-admin', [
            'user' => User::where('role', 1)->paginate()
        ]);
    }


    public function store()
    {
        $this->validate();

        $data = $this->only('nama', 'jenis_kelamin', 'nik', 'no_hp', 'email');


        try {
            $filename = md5(microtime()) . '.' . $this->foto->getClientOriginalExtension();
            $this->foto->storeAs('public/profile', $filename);
            $data['foto'] = $filename;
            $data['password'] = 'super';
            $data['role'] = 1;

            User::create($data);
            $this->dispatch('alert-confirm', text: 'Data berhasil ditambah.', icon: 'success', rute: '');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data gagl disimpan, ' . $th->getMessage(), icon: 'error');
        }
    }
}
