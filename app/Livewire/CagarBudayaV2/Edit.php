<?php

namespace App\Livewire\CagarBudayaV2;

use App\Livewire\Forms\CagarBudayaV2;
use App\Models\Cagar_budaya_v2;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public CagarBudayaV2 $form;

    public $disable = true;

    #[Locked]
    public $step = 1;

    #[Locked]
    public $id;


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

    function setDisable()
    {
        $this->disable = $this->disable ? false : true;
    }

    public function mount($id)
    {
        $this->id = $id;

        $this->data = Cagar_budaya_v2::findOrFail($id);
    }


    public function render()
    {
        $this->form->setData($this->id);

        return view('livewire.cagar-budaya-v2.edit', [
            'page' => 'Ubah Data ' . $this->data->nama_cagar
        ]);
    }



    public function updated($name, $value)
    {
        $name_rep = explode('.', $name);
        $this->data->update([
            $name_rep[1] => $value ?? '' ? $value :  '-',
        ]);


        // if (count($name_rep) > 1 && $value instanceof UploadedFile) {
        //     $filename = md5($value . microtime()) . '.' . $value->getClientOriginalExtension();
        //     if ($name_rep[1] == 'dokumen') {
        //         Validator::make([
        //             'dokumen' => $value
        //         ], [
        //             'dokumen' => 'file|mimes:pdf,doc,docx,csv,clx|max:2048',
        //         ], [
        //             'file' => 'Data harus berupa sebuah berkas.',
        //             'mimes' => 'Berkas harus berjenis: :values.',
        //             'max' => ' Maksimal file berukuran :max KB.'
        //         ])->validated();

        //         if (Storage::exists('public/document/' . $this->data->dokumen)) {
        //             Storage::delete('public/document/' . $this->data->dokumen);
        //         }
        //         $value->storeAs('public/document', $filename);

        //         $this->data->update([
        //             $name_rep[1] => $filename,
        //         ]);
        //         $this->dispatch('sweat-alert', title: 'Berhasil Menambahkan Dokumen.', icon: 'success');
        //     }
        // } else {
        // $this->data->update([
        //     $name_rep[1] => $value ?? '' ? $value :  '-',
        // ]);
        // }
    }


    function prevStep()
    {
        sleep(1);

        $this->step--;
    }


    function setStep($step)
    {

        $this->step = $step;
    }

    public function updatedFormFoto()
    {
        Validator::make(
            $this->form->only('foto'),
            $this->form->rules(['foto']),
        )->validated();

        try {
            $filename = md5($this->form->foto . microtime()) . '.' . $this->form->foto->getClientOriginalExtension();
            $this->form->foto->storeAs('public/photos', $filename);

            array_push($this->form->imgPush, $filename);

            $this->data->update([
                'foto' => implode('||', $this->form->imgPush),
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }

    public function deleteImg($key)
    {

        if (Storage::exists('public/photos/' . $this->form->imgPush[$key])) {
            Storage::delete('public/photos/' . $this->form->imgPush[$key]);
        }

        unset($this->form->imgPush[$key]);

        if (count($this->form->imgPush) > 0) {
            $imp = implode('||', $this->form->imgPush);
        } else {
            $imp = null;
        }

        $this->data->update([
            'foto' => $imp,
        ]);

        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }


    public function download()
    {
        if (Storage::exists('public/document/' . $this->data->dokumen)) {
            return Storage::download('public/document/' . $this->data->dokumen);
        }

        $this->dispatch('sweat-alert', title: 'Dokumen Tidak Tersedia.', icon: 'error');
    }



    public function confirmDelete()
    {
        if (Storage::exists('public/document/' . $this->data->dokumen)) {
            Storage::delete('public/document/' . $this->data->dokumen);
            $this->data->update([
                'dokumen' => null
            ]);
        } else {
            $this->data->update([
                'dokumen' => null
            ]);
        }

        $this->form->reset('dokumen');
        $this->dispatch('sweat-alert', title: 'Dokumen Berhasil Dihapus.', icon: 'success');
    }
}
