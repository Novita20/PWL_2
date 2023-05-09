<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matkul = MataKuliahModel::all();
        return view('mataKuliah.mataKuliah')
        ->with('mk',$matkul);
        // return view('mataKuliah.mataKuliah', ['matkul' => $matkul]);
    }


    public function create()
    {
        return view('mataKuliah.create_mataKuliah', ['url_form' => url('/matkul')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,',
            'sks' => 'required|integer',
            'jam' => 'required|integer',
            'semester' => 'required|string|max:12',
        ]);

        MataKuliahModel::create($request->except(['_token']));
        return redirect('/matkul')
            ->with('success', 'Mata Kuliah Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $matakuliah = MataKuliahModel::find($id);
        return view('matakuliah.detail', compact('matakuliah'));
    }

    public function edit($id)
    {
        $matkul = MataKuliahModel::where('id_matkul', '=', 1)->get()[0];
        return view('mataKuliah.create_mataKuliah', ['urlform' => url("/matkul/" . $id), 'matkul' => $matkul]);
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,'.$id,
            'sks' => 'required|integer',
            'jam' => 'required|integer',
            'semester' => 'required|string|max:12',
        ]);

        $requestData = $request->except(['_token', '_method']);
        $requestData['id_matkul'] = $id;

        $data = MataKuliahModel::where('id_matkul', '=', $id)->update($requestData);
        return redirect('/matkul')
            ->with('success', 'Mata Kuliah Berhasil Diedit');
    }

    public function destroy($id)
    {
        $requestData['id_matkul'] = $id;

        MataKuliahModel::where('id_matkul', '=', $id)->delete();
        return redirect('/matkul')
            ->with('success', 'Mata Kuliah Berhasil Dihapus');
    }
}
