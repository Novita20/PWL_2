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
        return view('tes.matkul', ['matkul' => $matkul]);
    }


    public function create()
    {
        return view('tes.create_matkul', ['urlform' => url('/matkul')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required|string|max:5',
            'matakuliah' => 'required|string|max:30',
            'pengajar' => 'required|string|max:30',
        ]);

        MataKuliahModel::create($request->except(['_token']));
        return redirect('/matkul')
            ->with('success', 'Mata Kuliah Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $matkul = MataKuliahModel::where('id_matkul', '=', 1)->get()[0];
        return view('tes.create_matkul', ['urlform' => url("/matkul/" . $id), 'matkul' => $matkul]);
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'kode_matkul' => 'required|string|max:5',
            'matakuliah' => 'required|string|max:30',
            'pengajar' => 'required|string|max:30',
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