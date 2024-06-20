<?php

namespace App\Livewire\CagarBudayaV2;

use App\Livewire\Forms\CagarBudayaV2;
use App\Models\Cagar_budaya_v2;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Complete extends Component
{
    use WithFileUploads;

    public CagarBudayaV2 $form;

    #[Locked]
    public $id;

    #[Locked]
    public $step;

    #[Locked]
    public $data;


    #[Computed()]
    public function kabupatenOption()
    {
        return Kabupaten::where('id', 5202)->get();
    }

    #[Computed()]
    public function kecamatanOption()
    {
        return Kecamatan::where('regency_id', $this->form->kabupaten)->get();
    }

    #[Computed()]
    public function desaOption()
    {
        return Desa::where('district_id', $this->form->kecamatan)->get();
    }


    #[Computed()]
    public function provinsiOptionPemilik()
    {
        return Provinsi::get();
    }

    #[Computed()]
    public function kabupatenOptionPemilik()
    {
        return Kabupaten::where('province_id', $this->form->provinsi_pemilik)->get();
    }

    #[Computed()]
    public function kecamatanOptionPemilik()
    {
        return Kecamatan::where('regency_id', $this->form->kabupaten_pemilik)->get();
    }

    #[Computed()]
    public function desaOptionPemilik()
    {
        return Desa::where('district_id', $this->form->kecamatan_pemilik)->get();
    }



    public function updatedFormKabupaten()
    {
        $this->data->update([
            'kabupaten' => $this->form->kabupaten,
            'kecamatan' => '-',
            'desa_kel' => '-',
        ]);
    }

    public function updatedFormKecamatan()
    {
        $this->data->update([
            'kecamatan' => $this->form->kecamatan,
            'desa_kel' => '-',
        ]);
    }



    public function updatedFormProvinsiPemilik()
    {
        $this->data->update([
            'provinsi_pemilik' => $this->form->provinsi_pemilik,
            'kabupaten_pemilik' => '-',
            'kecamatan_pemilik' => '-',
            'desa_kel_pemilik' => '-',
        ]);
    }


    public function updatedFormKabupatenPemilik()
    {
        $this->data->update([
            'kabupaten_pemilik' => $this->form->kabupaten_pemilik,
            'kecamatan_pemilik' => '-',
            'desa_kel_pemilik' => '-',
        ]);
    }

    public function updatedFormKecamatanPemilik()
    {
        $this->data->update([
            'kecamatan_pemilik' => $this->form->kecamatan_pemilik,
            'desa_kel_pemilik' => '-',
        ]);
    }



    public function mount($id)
    {
        $this->id = $id;


        $this->data = Cagar_budaya_v2::findOrFail($id);

        $this->step = $this->data->status_draft;
    }


    public function render()
    {

        $this->form->setData($this->id);

        return view('livewire.cagar-budaya-v2.complete', [
            'page' => 'Lengkapi Data ' . $this->data->nama_cagar
        ]);
    }

    public function updated($name, $value)
    {
        $name_rep = explode('.', $name);
        $this->data->update([$name_rep[1] => $value, 'status_draft' => $this->step]);


        // if ($value instanceof UploadedFile) {
        //     $filename = md5($value . microtime()) . '.' . $value->getClientOriginalExtension();

        //     if ($name_rep[1] == 'dokumen') {
        //         Validator::make(
        //             ['dokumen' => $value],
        //             ['dokumen' => 'file|mimes:pdf,doc,docx,csv,clx|max: 2048',]
        //         )->validated();

        //         if (Storage::exists('public/document/' . $this->data->dokumen)) {
        //             Storage::delete('public/document/' . $this->data->dokumen);
        //         }

        //         $value->storeAs('public/document', $filename);

        //         $this->data->update([$name_rep[1] => $filename, 'status_draft' => $this->step]);

        //         $this->dispatch('sweat-alert', title: 'Berhasil Menambahkan Dokumen.', icon: 'success');
        //     }
        // } else {
        // }
    }

    function nextStep()
    {
        sleep(1);

        if ($this->step == 1) {
            $validator = Validator::make(
                $this->form->all(),
                $this->form->rules([
                    'kabupaten',
                    'kecamatan',
                    'desa_kel',
                    'dusun',
                    'alamat',
                    'latitude',
                    'longitude',
                    'ketinggian',
                    'bahan_bangunan',
                    'satuan_waktu',
                    'priode_waktu',
                    'waktu_pembuatan',
                    'ornamen_bangunan',
                    'tanda_bangunan',
                    'warna_bangunan',
                    'panjang',
                    'lebar',
                    'tinggi',
                    'luas_bangunan',
                    'luas_tanah'
                ]),
            )->validated();

            try {
                $this->form->stepOne($this->id);
                $this->dispatch('sweat-alert', title: 'Data Step 1 Berhasil Disimpan.', icon: 'success');
                $this->step++;
            } catch (\Throwable $th) {
                $this->dispatch('sweat-alert', title: 'Data Gagal Disimpan.', icon: 'error');
            }
        } elseif ($this->step == 2) {

            $validator = Validator::make(
                $this->form->all(),
                $this->form->rules([
                    'keutuhan',
                    'pemeliharaan',
                    'pemugaran',
                    'adaptasi',
                    'status_kepemilikan',
                    'nama_pemilik',
                    'status_perolehan',
                    'provinsi_pemilik',
                    'kabupaten_pemilik',
                    'kecamatan_pemilik',
                    'desa_kel_pemilik',
                    'alamat_pemilik',
                    'latitude_pemilik',
                    'longitude_pemilik',
                    'zona_utara',
                    'zona_selatan',
                    'zona_barat',
                    'zona_timur',
                ])
            )->validated();

            try {
                $this->form->stepTwo($this->id);
                $this->dispatch('sweat-alert', title: 'Data Step 2 Data Berhasil Disimpan.', icon: 'success');
                $this->step++;
            } catch (\Throwable $th) {
                $this->dispatch('sweat-alert', title: 'Data Gagal Disimpan.', icon: 'error');
            }
        } elseif ($this->step == 3) {
            $validator = Validator::make(
                $this->form->all(),
                $this->form->rules([
                    'tingkatan_data',
                    'tahun_pendataan',
                    'tahun_verifikasi',
                    'tahun_penetapan',
                    'entitas_kebudayaan',
                    'kategori',
                    'deskripsi',
                    'status_pengelolaan',
                    'video',
                    // 'dokumen',
                ])
            )->validated();

            try {
                $this->form->stepThree($this->id);

                $this->dispatch('alert-confirm', rute: route('index.cagar_budaya'),  icon: 'success', text: 'Semua Data Berhasil Diinput.');
            } catch (\Throwable $th) {
                $this->dispatch('sweat-alert', title: 'Data Gagal Disimpan.', icon: 'error');
            }
        }
    }

    function prevStep()
    {
        sleep(1);

        $this->step--;
    }


    public function confirmDelete()
    {
        $data = Cagar_budaya_v2::find($this->id);

        if (Storage::exists('public/document/' . $data->dokumen)) {
            Storage::delete('public/document/' . $data->dokumen);
            $data->update([
                'dokumen' => null
            ]);
        } else {
            $data->update([
                'dokumen' => null
            ]);
        }

        $this->form->reset('dokumen');

        $this->dispatch('sweat-alert', title: 'Dokumen Berhasil Dihapus.', icon: 'success');
    }
}
