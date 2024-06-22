<?php

namespace App\Livewire\Landing;

use App\Models\Cagar_budaya_v2;
use App\Models\Tbl_karya_budaya;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_tenaga_kebudayaan;
use App\Models\User;
use App\Models\Wbtb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $slide = 'pendataan';

    public $keyBudaya;

    public $keySeni;

    public $dataModal;



    public function render()
    {

        if ($this->keyBudaya) {
            $this->dataModal = Tbl_karya_budaya::find($this->keyBudaya);
        }
        if ($this->keySeni) {
            $this->dataModal = Tbl_karya_seni::find($this->keySeni);
        }

        $widget = [
            'Cagar Budaya' => [
                'data' => new Cagar_budaya_v2(),
                'route' => route('index.cagar_budaya')
            ],
            'Karya Budaya' => [
                'data' => new Tbl_karya_budaya(),
                'route' => route('index.karya-budaya')
            ],
            'Karya Seni' => [
                'data' => new Tbl_karya_seni(),
                'route' => route('index.karya-seni')
            ],
            'WBTB' => [
                'data' => new Wbtb(),
                'route' => route('index.wbtb')
            ],
        ];

        return view('livewire.landing.dashboard', [
            'widget' => $widget,
            'pendataan' => Tbl_tenaga_kebudayaan::with('kec', 'desaKel')->where('status', 0)->latest()->paginate()
        ]);
    }

    public function updatedSlide()
    {

        $this->resetPage();
    }

    public function confirmKarya()
    {
        $this->dataModal->update([
            'status' => 1,
            'pesan_tolak' => null,
        ]);
        $this->reset('keyBudaya', 'keySeni', 'dataModal');
        $this->dispatch('sweat-alert', title: 'Data Berhasil DiKonfirmasi', icon: 'success');
    }

    public function confirmTenaga($id)
    {
        try {
            DB::beginTransaction();
            $data = Tbl_tenaga_kebudayaan::find($id);

            $valid = Validator::make(
                [
                    'nik' => $data->nik,
                    'nama' => $data->nama,
                    'no_hp' => $data->no_hp,
                    'email' => $data->email,
                    'jenis_kelamin' => $data->jenis_kelamin,
                    'foto' => $data->foto,
                    'password' => $data->nik,
                ],
                [
                    'nik' => 'unique:users,nik',
                    'nama' => 'unique:users,nama',
                    'no_hp' => 'unique:users,no_hp',
                    'email' => 'unique:users,email',
                    'password' => '',
                    'foto' => '',
                    'jenis_kelamin' => '',
                ]
            )->validate();

            $data->update([
                'status' => 1
            ]);

            User::create($valid);

            DB::commit();
            $this->dispatch('sweat-alert', title: 'Data Berhasil DiKonfirmasi', icon: 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }

    public function rejectKarya($msg)
    {
        $this->dataModal->update([
            'pesan_tolak' => $msg,
            'status' => 2
        ]);

        $this->reset('keyBudaya', 'keySeni', 'dataModal');
        $this->dispatch('sweat-alert', title: 'Data Berhasil Ditolak', icon: 'warning');
    }

    public function resetKey()
    {
        $this->reset('keyBudaya', 'keySeni', 'dataModal');
    }
}
