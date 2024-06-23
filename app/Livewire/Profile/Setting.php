<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{


    use WithFileUploads;

    public $name;
    public $nik;
    public $no_hp;
    public $jenis_kelamin;
    public $email;
    public $password;
    public $confirmPassword;
    public $foto;

    public function mount()
    {
        $this->name = auth()->user()->nama;
        $this->nik = auth()->user()->nik;
        $this->no_hp = auth()->user()->no_hp;
        $this->jenis_kelamin = auth()->user()->jenis_kelamin;
        $this->foto = asset('storage/profile/' . auth()->user()->foto);
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.profile.setting', [
            'page' => 'Profile'
        ]);
    }



    public function updateProfile()
    {
        $user = User::findOrFail(auth()->user()->id);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_hp' => $this->no_hp,
        ];

        $rule = [
            'name' => 'required|min:3|max:100',
            'email' => 'required|min:5|max:150',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|min:12|max:12',
        ];

        $msg = [
            'required' => 'Form Harus Diisi.',
            'min' => 'Form Minimal :min.',
            'max' => 'Form Maksimal :max.',
            'in' => 'Form Yang Dipilih Tidak Valid.',
            'numeric' => 'Form Harus Berupa Angka.',
            'same' => 'Form Harus Sama dengan :other',
        ];

        if ($this->password) {
            $data['password'] = $this->password;
            $data['confirmPassword'] = $this->confirmPassword;

            $rule['password'] = 'required|min:5|max:25';
            $rule['confirmPassword'] = 'required|min:5|max:25|same:password';
        }

        if ($this->foto instanceof \Illuminate\Http\UploadedFile) {
            $data['foto'] = $this->foto;
            $rule['foto'] = 'required|file|mimes:jpg,png,jpeg|max:2024';
        }


        Validator::make($data, $rule, $msg)->validated();

        try {

            $user->nama = $this->name;
            $user->nik = $this->nik;
            $user->no_hp = $this->no_hp;
            $user->jenis_kelamin = $this->jenis_kelamin;
            $user->email = $this->email;

            if ($this->password) {
                $user->password = $this->password;
            }

            if ($this->foto instanceof \Illuminate\Http\UploadedFile) {
                $fileName = uniqid() . '-' . preg_replace('/[^\p{L}\p{N}]/u', '', $this->name) . '.' . $this->foto->getClientOriginalExtension();
                if (Storage::exists('public/profile/' . $user->foto)) {
                    Storage::delete('public/profile/' . $user->foto);
                }
                $this->foto->storeAs('public/profile', $fileName);
                $user->foto = $fileName;
            }

            $user->save();

            $this->dispatch('sweat-alert', title: 'Profile Berhasil Diubah.', icon: 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Profile Gagal Diubah.', icon: 'error');
        }
    }
}
