<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $mahasiswa = MahasiswaModel::all();
        // return view('P6.mahasiswa')
        //     ->with('mhs', $mahasiswa);

        //yang semula Mahasiswa::all, diubah menjadi with() menyatakan relasi
        $mahasiswa = MahasiswaModel::with('kelas')->get();
        $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        return view('P6.mahasiswa',['mhs'=>$mahasiswa,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('mahasiswa.create_mahasiswa')
        //     ->with('url_form', url('/mahasiswa'));
        $kelas =Kelas::all();//mendapatkan data dari tabel kelas
        return view('mahasiswa.create_mahasiswa',['kelas' => $kelas, 'url_form'=>route('mahasiswa.store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nim'=>'required|string|max:10|unique:mahasiswas,nim',
            'nama'=>'required|string|max:50',
            'jk'=>'required|in:l,p',
            'tempat_lahir'=>'required|string|max:50',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required|string|max:225',
            'hp'=>'required|digits_between:6,15',
            'kelas_id'=>'required'
        ]);

        $mhs = new MahasiswaModel();
        $mhs->nim=$request->get('nim');
        $mhs->nama=$request->get('nama');
        $mhs->jk=$request->get('jk');
        $mhs->tempat_lahir=$request->get('tempat_lahir');
        $mhs->tanggal_lahir=$request->get('tanggal_lahir');
        $mhs->alamat=$request->get('alamat');
        $mhs->hp=$request->get('hp');
        $mhs->save();

        $kelas = new Kelas();
        $kelas->id = $request->get('kelas_id');

        $mhs->kelas()->associate($kelas);
        $mhs->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa')
            ->with('success','Mahasiswa Berhasil ditambahkan');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
        return view('mahasiswa.detail', ['mhs'=>$mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kls = Kelas::all();
        $mahasiswa =MahasiswaModel::find($id);
        return view('mahasiswa.create_mahasiswa')
                    ->with('kelas', $kls)
                    ->with('mhs',$mahasiswa)
                    ->with('url_form', url('/mahasiswa/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $request->validate([
            'nim'=>'required|string|max:10|unique:mahasiswas,nim,'.$id,
            'nama'=>'required|string|max:50',
            'jk'=>'required|in:l,p',
            'tempat_lahir'=>'required|string|max:50',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required|string|max:225',
            'hp'=>'required|digits_between:6,15',
        ]);

        $data = MahasiswaModel::where('id', '=', $id)->update($request->except(['_token', '_method', 'submit']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('mahasiswa')
            ->with('success','Mahasiswa Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

}
