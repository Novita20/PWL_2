<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaModelController extends Controller
{
    public function index()
    {
        $keluarga = KeluargaModel::all();
        return view('keluarga.keluarga')
            ->with('keluarga', $keluarga);
    }

    public function create()
    {
        return view('keluarga.create_keluarga', ['url_form', 'url_form' => url('/keluarga')]);
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required|string|max:50',
            'status' => 'required',
        ]);

        $id = array('id'=> 'B'.rand(1,999));

        $data = KeluargaModel::create(array_merge($request->except(['_token']),$id));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('keluarga')
            ->with('success', 'Data keluarga Berhasil Ditambahkan');
    }

    public function show(KeluargaModel $keluarga)
    {
        //
    }

    public function edit($id)
    {
        $keluarga = keluargaModel::find($id);
        return view('keluarga.create_keluarga')
            ->with('keluarga', $keluarga)
            ->with('url_form', url('/keluarga/' . $id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'status' => 'required|string',
        ]);

        $data = KeluargaModel::where('id', '=', $id)->update($request->except(['_token', '_method', 'submit']));
        return redirect('keluarga')
            ->with('success', 'Data keluarga Berhasil Diiedit');
    }

    public function destroy($id)
    {
        keluargaModel::where('id', '=', $id)->delete();
        return redirect('keluarga')
            ->with('success', 'Data keluarga Berhasil Dihapus');
    }
}