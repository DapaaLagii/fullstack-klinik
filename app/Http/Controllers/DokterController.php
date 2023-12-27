<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dokter'] = \App\Models\Dokter::paginate(2);
        $data['judul'] = 'Data-Data Dokter';
        return view('dokter_index', $data);
        /* if (request('q') != '') {
            $dokter = \App\Models\Dokter::all
                ->orderBy('nama_dokter', 'asc')
                ->where('nama_dokter', 'like', '%' . request('q') . '%')
                ->orWhere('kode_dokter', 'like', '%' . request('q') . '%')
                ->get();
        } else {
            $dokter = \App\Models\Dokter::limit(3)
                ->orderBy('nama_dokter', 'asc')
                ->get();
        } */

        //dd($dokter);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dokter'] = new \App\Models\Dokter();
        $data['judul'] = 'Data Semua Dokter RS Umbrella RE';
        $data['route'] = 'dokter.store';
        $data['method'] = 'POST';
        $data['tombol'] = 'Simpan';
        $data['list_sp'] = \App\Models\Spesialis::pluck('nama', 'id');
        /*  'Umum' => 'Umum',
            'Bedah' => 'Bedah',
            'THT' => 'THT',
            'Penyakit-Dalam' => 'Penyakit Dalam',
            'Kulit'=>'Kulit' */

        return view('dokter_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama_dokter' => 'required',
            'spesialis_id' => 'required',
            'spesialis_id' => 'required',
            'nomor_hp' => 'required',
        ]);
        $dokter = new \App\Models\Dokter();
        $dokter->fill($validasidata);
        $dokter->save();

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
        $data['dokter'] = \App\Models\Dokter::findOrFail($id);
        $data['route'] = ['dokter.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'update';
        $data['judul'] = 'Edit Data Dokter';
        $data['list_sp'] = \App\Models\Spesialis::pluck('nama', 'id'); /* [
            '' => 'Pilih Spesialis',
            'Umum' => 'Umum',
            'Bedah' => 'Bedah',
            'THT' => 'THT',
            'Kulit' => 'Kulit',
            'Penyakit Dalam' => 'Penyakit Dalam',
            'Syaraf' => 'Syaraf'
        ]; */
        return view('dokter_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasidata = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama_dokter' => 'required',
            'spesialis_id' => 'required',
            //'spesialis_id' => 'required',
            'nomor_hp' => 'required',
        ]);
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->fill($validasidata);
        $dokter->save();

        flash('Data Berhasil Diubah');
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->delete();
        flash('Data Berhasil Dihapus');
        return back();
    }

    public function laporan()
    {
        $data['dokter'] = \App\Models\Dokter::all();
        $data['judul'] = 'Laporan Data Dokter';
        return view('dokter_laporan', $data);
    }
}
