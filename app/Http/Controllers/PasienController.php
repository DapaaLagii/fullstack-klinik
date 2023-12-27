<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::paginate(2);
        $data['judul'] = 'Data-Data Pasien';

        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['judul'] = 'Data Semua Pasien RS Umbrella RE';
        $data['route'] = 'pasien.store';
        $data['method'] = 'POST';
        $data['tombol'] = 'Simpan';
        $data['list_sp'] = [
            'Rawat Inap' => 'Rawat Inap',
            'Rawat Jalan' => 'Rawat Jalan',

        ];
        return view('pasien_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);
        $pasien = new \App\Models\pasien();
        $pasien->fill($validasidata);
        $pasien->save();

        flash('Data Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\pasien::findOrFail($id);
        $data['route'] = ['pasien.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'update';
        $data['judul'] = 'Edit Data pasien';
        $data['list_sp'] = [
            '' => 'Pilih Rawat',
            'Rawat Inap' => 'Rawat Inap',
            'Rawat Jalan' => 'Rawat Jalan',
        ];
        return view('pasien_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasidata = $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien' . $id,
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($validasidata);
        $pasien->save();

        flash('Data Berhasil Diubah');
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        flash('Data Berhasil Dihapus');
        return back();
    }

    public function laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul'] = 'Laporan Data Pasien';
        return view('pasien_laporan', $data);
    }
}
