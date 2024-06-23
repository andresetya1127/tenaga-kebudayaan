<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListAdmin extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    public $title = 'Tambah Pengguna Admin';

    #[Validate('required|max:100|alpha')]
    public $nama;
    #[Validate('required|in:L,P')]
    public $jenis_kelamin;
    #[Validate('required|max:16|unique:users,nik')]
    public $nik;
    #[Validate('required|max:13|unique:users,no_hp')]
    public $no_hp;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|image|mimes:jpeg,jpg,png,gif|max:2048')]
    public $foto;
    #[Validate('required|min:5|max:20|alpha_dash')]
    public $password;
    #[Validate('required|min:5|max:20|same:password|alpha_dash')]
    public $confirm;

    public $edit;

    public function render()
    {
        return view('livewire.list-admin', [
            'user' => User::where('role', 1)->whereNot('nik', 'super')->paginate()
        ]);
    }


    public function store()
    {
        $this->validate();

        $data = $this->only('nama', 'jenis_kelamin', 'nik', 'no_hp', 'email', 'password');


        try {
            $filename = md5(microtime()) . '.' . $this->foto->getClientOriginalExtension();
            $this->foto->storeAs('public/profile', $filename);
            $data['foto'] = $filename;
            $data['role'] = 1;
            $data['verify'] = 1;

            User::create($data);
            $this->dispatch('alert-confirm', text: 'Data berhasil ditambah.', icon: 'success', rute: '');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan, ' . $th->getMessage(), icon: 'error');
        }
    }


    public function update()
    {

        $data = $this->only('nama', 'jenis_kelamin', 'nik', 'no_hp', 'email');

        if ($this->password) {
            $data['password'] = $this->password;
            $data['confirm'] = $this->confirm;
        }

        $valid = Validator::make($data, [
            'nama' => 'required|max:100|alpha',
            'jenis_kelamin' => 'required|in:L,P',
            'nik' => 'required|min:16|max:16|unique:users,nik,' . $this->edit,
            'no_hp' => 'required|max:13|unique:users,no_hp,' . $this->edit,
            'email' => 'required|email|unique:users,email,' . $this->edit,
            'password' => 'min:5|max:20|alpha_dash',
            'confirm' => 'min:5|max:20|same:password|alpha_dash'
        ])->validate();


        try {
            $user = User::findOrFail($this->edit);
            if ($this->foto instanceof UploadedFile) {
                if (Storage::exists('public/profile/' . $user->foto)) {
                    Storage::delete('public/profile/' . $user->foto);
                }
                $filename = md5(microtime()) . '.' . $this->foto->getClientOriginalExtension();
                $this->foto->storeAs('public/profile', $filename);
                $data['foto'] = $filename;
            }

            $user->update($data);
            $this->dispatch('alert-confirm', text: 'Data berhasil disimpan.', icon: 'success', rute: '');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan, ' . $th->getMessage(), icon: 'error');
        }
    }


    public function updatedEdit($id)
    {
        if ($this->edit) {
            $user = User::findOrFail($id);
            $this->title = 'Ubah Pengguna Admin.';
            $this->fill($user->only('nama', 'jenis_kelamin', 'nik', 'no_hp', 'email'));
            $this->resetValidation();
        } else {
            $this->reset();
        }
    }


    public function verifyOff($id)
    {
        $user = User::findOrFail($id);
        $user->verify = $user->verify ? 0 : 1;
        $user->save();
        $this->dispatch('sweat-alert', title: 'Akses Dimatikan', icon: 'success');
    }
}
