<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return view('rental.mobil', ['mobil' => $mobil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rental.create_mobil', ['url_form' => url('/mobil')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string',
            'merk' => 'required|string|max:50',
            'tipe_mobil' => 'required|string|max:50',
            'status' => 'required|string',
        ]);
        Mobil::create($request->except(['_token']));
        return redirect('/mobil')
            ->with('success', 'Data Mobil Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('rental.create_mobil')
                    ->with('mobil',$mobil)
                    ->with('url_form', url('/mobil/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor'=>'required|string',
            'merk'=>'required|string',
            'tipe_mobil'=>'required|string',
            'status'=>'required|string',
        ]);

        $data = Mobil::where('id', '=', $id)->update($request->except(['_token', '_method', 'submit']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('mobil')
            ->with('success','Mobil Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobil::where('id', '=', $id)->delete();
        return redirect('mobil')
        ->with('success', 'Mobil Berhasil Dihapus');
    }
}
