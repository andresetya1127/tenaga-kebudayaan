<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_cagar_budaya;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Form;


class CagarBudaya extends Form
{
    // Jangan Diubah Ini field sekaligus input
    public $id, $nama, $tmpt_lahir, $tgl_lahir, $jk, $pendidikan, $agama,
        $pekerjaan, $no_hp, $email, $facebook, $instagram, $youtube, $bidang, $photos = [];
    // ==========================================

    public function store()
    {
        $data = new Tbl_cagar_budaya();
        $validate = Validator::make(
            [
                'nama' => $this->nama,
                'tmpt_lahir' => $this->tmpt_lahir,
                'tgl_lahir' => $this->tgl_lahir,
                'jk' => $this->jk,
                'pendidikan' => $this->pendidikan,
                'agama' => $this->agama,
                'pekerjaan' => $this->pekerjaan,
                'no_hp' => $this->no_hp,
                'email' => $this->email,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'youtube' => $this->youtube,
                'bidang' => $this->bidang,
            ],
            [
                'nama' => 'required|min:5|string',
                'tmpt_lahir' => 'required|min:5',
                'tgl_lahir' => 'required:|date',
                'jk' => 'required|in:L,P',
                'pendidikan' => 'required|in:' . implode(',', $data->getEnum('pendidikan')),
                'agama' => 'required|in:' . implode(',', $data->getEnum('agama')),
                'pekerjaan' => 'required|in:' . implode(',', $data->getEnum('pekerjaan')),
                'no_hp' => 'required|min:12|max:20',
                'email' => 'required|email',
                'facebook' => 'required|min:5',
                'instagram' => 'required|min:5',
                'youtube' => 'required|min:5',
                'bidang' => 'required|min:5',
            ],
            [
                'required' => 'Form  Harus Diisi.',
                'numeric' => 'Form harus berupa angka.',
                'email' => 'Form harus berupa alamat email yang valid.',
                'in' => 'Form yang dipilih tidak valid.',
                'min' => 'Form minimal bernilai :min.',
                'max' => 'Form Maximal bernilai :max.',
                'date' => 'Form bukan tanggal yang valid.',
                'string' => 'Form harus berupa string.',

            ]
        )->validate();

        try {
            DB::beginTransaction();
            $data->nama_pemilik = $this->nama;
            $data->tmpt_lahir = $this->tmpt_lahir;
            $data->tgl_lahir = $this->tgl_lahir;
            $data->jenis_kelamin = $this->jk;
            $data->pendidikan = $this->pendidikan;
            $data->agama = $this->agama;
            $data->pekerjaan = $this->pekerjaan;
            $data->no_hp = $this->no_hp;
            $data->email = $this->email;
            $data->facebook = $this->facebook;
            $data->instagram = $this->instagram;
            $data->youtube = $this->youtube;
            $data->bidang = $this->bidang;
            $data->save();

            $this->reset();

            DB::commit();

            redirect()->route('index.cagar_budaya')->with('alert', [
                'type' => 'success',
                'message' => 'Data Berhasil Ditambah.'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            // redirect()->back()->with('alert', [
            //     'type' => 'error',
            //     'message' => $th->getMessage()
            // ]);
        }
    }


    public function setData($id)
    {
        $data = Tbl_cagar_budaya::find($id);
        $this->id = $data->id_cagar_budaya;
        $this->nama = $data->nama_pemilik;
        $this->tmpt_lahir = $data->tmpt_lahir;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->jk = $data->jenis_kelamin;
        $this->pendidikan = $data->pendidikan;
        $this->agama = $data->agama;
        $this->pekerjaan = $data->pekerjaan;
        $this->no_hp = $data->no_hp;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->instagram = $data->instagram;
        $this->youtube = $data->youtube;
        $this->bidang = $data->bidang;
    }

    public function update()
    {
        $data = Tbl_cagar_budaya::find($this->id);

        $validate = Validator::make(
            [
                'nama' => $this->nama,
                'tmpt_lahir' => $this->tmpt_lahir,
                'tgl_lahir' => $this->tgl_lahir,
                'jk' => $this->jk,
                'pendidikan' => $this->pendidikan,
                'agama' => $this->agama,
                'pekerjaan' => $this->pekerjaan,
                'no_hp' => $this->no_hp,
                'email' => $this->email,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'youtube' => $this->youtube,
                'bidang' => $this->bidang,
            ],
            [
                'nama' => 'required|min:5|string',
                'tmpt_lahir' => 'required|min:5',
                'tgl_lahir' => 'required:|date',
                'jk' => 'required|in:L,P',
                'pendidikan' => 'required|in:' . implode(',', $data->getEnum('pendidikan')),
                'agama' => 'required|in:' . implode(',', $data->getEnum('agama')),
                'pekerjaan' => 'required|in:' . implode(',', $data->getEnum('pekerjaan')),
                'no_hp' => 'required|min:12|max:20',
                'email' => 'required|email',
                'facebook' => 'required|min:5',
                'instagram' => 'required|min:5',
                'youtube' => 'required|min:5',
                'bidang' => 'required|min:5',
            ],
            [
                'required' => 'Form  Harus Diisi.',
                'numeric' => 'Form harus berupa angka.',
                'email' => 'Form harus berupa alamat email yang valid.',
                'in' => 'Form yang dipilih tidak valid.',
                'min' => 'Form minimal bernilai :min.',
                'max' => 'Form Maximal bernilai :max.',
                'date' => 'Form bukan tanggal yang valid.',
                'string' => 'Form harus berupa string.',

            ]
        )->validate();

        DB::beginTransaction();
        try {
            $data->nama_pemilik = $this->nama;
            $data->tmpt_lahir = $this->tmpt_lahir;
            $data->tgl_lahir = $this->tgl_lahir;
            $data->jenis_kelamin = $this->jk;
            $data->pendidikan = $this->pendidikan;
            $data->agama = $this->agama;
            $data->pekerjaan = $this->pekerjaan;
            $data->no_hp = $this->no_hp;
            $data->email = $this->email;
            $data->facebook = $this->facebook;
            $data->instagram = $this->instagram;
            $data->youtube = $this->youtube;
            $data->bidang = $this->bidang;
            $data->save();

            DB::commit();

            redirect()->route('index.cagar_budaya')->with('alert', [
                'type' => 'success',
                'message' => 'Data Berhasil Diubah.'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
