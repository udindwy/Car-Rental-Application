<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth; // Tambahkan ini
use Livewire\Component;
use App\Models\Mobil;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage,
        $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;

    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate(
            [
                'nopolisi' => 'required',
                'merk' => 'required',
                'jenis' => 'required',
                'harga' => 'required',
                'foto' => 'required|image',
            ],
            [
                'nopolisi.required' => 'Nomor Polisi tidak boleh kosong!',
                'merk.required' => 'Merk tidak boleh kosong!',
                'jenis.required' => 'Jenis Mobil tidak boleh kosong!',
                'harga.required' => 'Harga tidak boleh kosong!',
                'foto.required' => 'Foto tidak boleh kosong!',
                'foto.image' => 'Foto dalam format image!',
            ],
        );

        $path = $this->foto->store('mobil', 'public');
        Mobil::create([
            'user_id' => Auth::id(),
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName(),
        ]);

        session()->flash('success', 'Berhasil simpan data!');
        $this->reset();
    }
    public function edit($id)
    {
        $this->editPage = true;
        $this->id = $id;
        $mobil = Mobil::find($id);
        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->harga = $mobil->harga;
    }
    public function update()
    {
        $mobil = Mobil::find($this->id);
        if (empty($this->foto)) {
            $mobil->update([
                'user_id' => Auth::id(),
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
            ]);
        } else {
            unlink(public_path('storage/mobil/' . $mobil->foto));
            $this->foto->storeAs('mobil', 'public', $this->foto->hashName());
            $mobil->update([
                'user_id' => Auth::id(),
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
                'foto' => $this->foto->hashName(),
            ]);
        }
        session()->flash('success', 'Berhasil update data!');
        $this->reset();
    }
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        unlink(public_path('storage/mobil/' . $mobil->foto));
        $mobil->delete();
        session()->flash('success', 'Berhasil hapus data!');
        $this->reset();
    }
}
