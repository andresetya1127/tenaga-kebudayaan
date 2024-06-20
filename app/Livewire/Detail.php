<?php

namespace App\Livewire;

use App\Models\detail_cagar_budaya;
use App\Models\detail_karya_budaya;
use App\Models\detail_karya_seni;
use App\Models\detail_odcb;
use App\Models\detail_wbtb;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    #[Locked]
    public $id;
    public $param;


    public $renovasi;
    public $tgl_renovasi;
    public $lembaga_renovasi;
    public $foto_sebelum;
    public $foto_sesudah;


    public $detailUpdate;




    public function mount($param, $id)
    {
        $this->param = $param;
        $this->id = $id;
    }

    #[On('sweat-alert')]
    public function render()
    {
        $data = $this->show();

        return view('livewire.detail', [
            'page' => 'Detail',
            'data' => $data
        ]);
    }


    public function show()
    {
        $data = match ($this->param) {
            'cagar_budaya' => detail_cagar_budaya::where('cagar_budaya_id', $this->id)->paginate(),
            'karya_budaya' => detail_karya_budaya::where('karya_budaya_id', $this->id)->paginate(),
            'karya_seni' => detail_karya_seni::where('karya_seni_id', $this->id)->paginate(),
            'wbtb' => detail_wbtb::where('wbtb_id', $this->id)->paginate(),
            'odcb' => detail_odcb::where('odcb_id', $this->id)->paginate(),
        };
        return $data;
    }



    public function getModelData()
    {
        $data = match ($this->param) {
            'cagar_budaya' => [
                'tabel' => (new detail_cagar_budaya),
                'relasi_id' => 'cagar_budaya_id'
            ],
            'karya_budaya' => [
                'tabel' => (new detail_karya_budaya),
                'relasi_id' => 'karya_budaya_id'
            ],
            'karya_seni' => [
                'tabel' => (new detail_karya_seni),
                'relasi_id' => 'karya_seni_id'
            ],
            'wbtb' => [
                'tabel' => (new detail_wbtb),
                'relasi_id' => 'wbtb_id'
            ],
            'odcb' => [
                'tabel' => (new detail_odcb),
                'relasi_id' => 'odcb_id'
            ],
        };

        return $data;
    }



    public function add()
    {
        sleep(1.2);

        $validator = Validator::make($this->all(), [
            'renovasi' => 'required',
            'tgl_renovasi' => 'required|date',
            'lembaga_renovasi' => 'required|max:200',
            'foto_sebelum' => 'required|image|max:2024|mimes:jpeg,png,jpg',
            'foto_sesudah' => 'required|image|max:2024|mimes:jpeg,png,jpg',
        ]);


        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        }

        $validator->validate();

        $this->save();
    }



    function save()
    {

        try {

            $foto_sebelum = md5(microtime() . rand()) . '.' . $this->foto_sebelum->getClientOriginalExtension();
            $foto_sesudah = md5(microtime() . rand()) . '.' . $this->foto_sesudah->getClientOriginalExtension();

            $this->foto_sebelum->storeAs('public/photos', $foto_sebelum);
            $this->foto_sesudah->storeAs('public/photos', $foto_sesudah);

            $data = $this->getModelData();


            $data['tabel']->create([
                'renovasi' => $this->renovasi,

                'tgl_renovasi' => $this->tgl_renovasi,

                'lembaga_renovasi' => $this->lembaga_renovasi,

                'foto_sebelum' => $foto_sebelum,

                'foto_sesudah' => $foto_sesudah,

                $data['relasi_id'] => $this->id,
            ]);

            $this->dispatch('alert-confirm', text: 'Data berhasil disimpan', icon: 'success', rute: '');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data  Gagal Ditambah.', icon: 'error');
        }
    }


    public function edit($id)
    {
        $data = $this->getModelData()['tabel']->find($id);

        $this->renovasi = $data->renovasi;
        $this->tgl_renovasi = $data->tgl_renovasi;
        $this->lembaga_renovasi = $data->lembaga_renovasi;
        $this->foto_sebelum = Storage::url('public/photos/' . $data->foto_sebelum);
        $this->foto_sesudah = Storage::url('public/photos/' . $data->foto_sesudah);
        $this->detailUpdate = $id;
        $this->dispatch('dropify-complete');
        $this->resetErrorBag();
    }


    public function update()
    {
        $data = $this->getModelData();

        $model = $data['tabel']->find($this->detailUpdate);

        $field = [
            'renovasi' => $this->renovasi,

            'tgl_renovasi' => $this->tgl_renovasi,

            'lembaga_renovasi' => $this->lembaga_renovasi,

            $data['relasi_id'] => $this->id,
        ];


        $validasi = [

            'renovasi' => 'required',

            'tgl_renovasi' => 'required|date',

            'lembaga_renovasi' => 'required|max:200',
        ];



        if (is_file($this->foto_sebelum)) {
            if (Storage::exists('public/photos/' . $model->foto_sebelum)) {
                Storage::delete('public/photos/' . $model->foto_sebelum);
            }


            $validasi['foto_sebelum'] = 'required|image|max:2024|mimes:jpeg,png,jpg';

            $foto_sebelum = md5(microtime() . rand()) . '.' . $this->foto_sebelum->getClientOriginalExtension();

            $field['foto_sebelum'] = $foto_sebelum;

            $this->foto_sebelum->storeAs('public/photos', $foto_sebelum);
        }



        if (is_file($this->foto_sesudah)) {

            if (Storage::exists('public/photos/' . $model->foto_sesudah)) {
                Storage::delete('public/photos/' . $model->foto_sesudah);
            }


            $validasi['foto_sesudah'] = 'required|image|max:2024|mimes:jpeg,png,jpg';

            $foto_sesudah = md5(microtime() . rand()) . '.' . $this->foto_sesudah->getClientOriginalExtension();

            $field['foto_sesudah'] = $foto_sesudah;

            $this->foto_sesudah->storeAs('public/photos', $foto_sesudah);
        }

        $validator = Validator::make($this->all(), $validasi);


        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        }
        $validator->validate();

        try {
            $model->update($field);

            $this->dispatch('alert-confirm', text: 'Data berhasil disimpan', icon: 'success', rute: '');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data  Gagal Ditambah.', icon: 'error');
        }
    }


    public function resetForm()
    {
        $this->reset('renovasi', 'tgl_renovasi', 'lembaga_renovasi', 'foto_sebelum', 'foto_sesudah', 'detailUpdate');
    }
}
