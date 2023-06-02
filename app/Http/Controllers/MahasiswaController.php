<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use App\Models\Kelas;
use App\Models\MahasiswaMatakuliah;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
// use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $mahasiswa = MahasiswaModel::all();
        // return view('P6.mahasiswa')
        //     ->with('mhs', $mahasiswa);

        //yang semula Mahasiswa::all, diubah menjadi with() menyatakan relasi
        // $mahasiswa = MahasiswaModel::with('kelas')->get();
        // $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        // return view('P6.mahasiswa',['mhs'=>$mahasiswa,'paginate'=>$paginate]);

        return view('P6.mahasiswa');
    }


    public function data()
    {
        $data = MahasiswaModel::selectRaw('id, nim, nama, foto, jk, tempat_lahir, tanggal_lahir, alamat, hp');

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
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
    // public function store(Request $request)
    // {
       // untuk menangkap request simpan data mahasiswa baru di controller
       public function store(Request $request)
       {
           $rule = [
               'nim' => 'required|string|max:10|unique:mahasiswas,nim',
               'nama' => 'required|string|max:50',
               'jk' => 'required|in:l,p',
               'tempat_lahir' => 'required|string|max:50',
               'tanggal_lahir' => 'required|date',
               'alamat' => 'required|string|max:255',
               'hp' => 'required|digits_between:6,15',
           ];

           $validator = Validator::make($request->all(), $rule);
           if ($validator->fails()) {
               return response()->json([
                   'status' => false,
                   'modal_close' => false,
                   'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
                   'data' => $validator->errors()
               ]);
           }

           $mhs = MahasiswaModel::create($request->all());
           return response()->json([
               'status' => ($mhs),
               'modal_close' => false,
               'message' => ($mhs) ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
               'data' => null
           ]);
       }
        // //validasi
        // $request->validate([
        //     'nim'=>'required|string|max:10|unique:mahasiswas,nim',
        //     'nama'=>'required|string|max:50',
        //     'jk'=>'required|in:l,p',
        //     'tempat_lahir'=>'required|string|max:50',
        //     'tanggal_lahir'=>'required|date',
        //     'alamat'=>'required|string|max:225',
        //     'hp'=>'required|digits_between:6,15',
        //     'kelas_id'=>'required'
        // ]);

        // // Menyimpan foto jika ada
        // $foto_name = null;
        // if ($request->file('image')) {
        //     $foto = $request->file('image');
        //     $foto_name = time() . '_' . $foto->getClientOriginalName();
        //     $foto_name = $request->file('image')->store('images', 'public');
        // }

        // $mhs = new MahasiswaModel();
        // $mhs->nim=$request->get('nim');
        // $mhs->nama=$request->get('nama');
        // $mhs->jk=$request->get('jk');
        // $mhs->tempat_lahir=$request->get('tempat_lahir');
        // $mhs->tanggal_lahir=$request->get('tanggal_lahir');
        // $mhs->alamat=$request->get('alamat');
        // $mhs->hp=$request->get('hp');
        // $mhs->foto=$foto_name;
        // $mhs->save();

        // $kelas = new Kelas();
        // $kelas->id = $request->get('kelas_id');

        // $mhs->kelas()->associate($kelas);
        // $mhs->save();

        // //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return redirect()->route('mahasiswa')
        //     ->with('success','Mahasiswa Berhasil ditambahkan');
        // }

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
        $rule = [
            //'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nim' => ['required', 'string', 'max:10', \Illuminate\Validation\Rule::unique('mahasiswas', 'nim')->ignore($id, 'id')],
            'nama' => 'required|string|max:50',
            // 'kelas' => 'required|string|max:50',
            'jk' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|string|max:50',

        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }
    // public function update(Request $request, $id)
    // {

    // $request->validate([
    //     'nim' => 'required|string|max:10|unique:mahasiswas,nim,'.$id,
    //     'nama' => 'required|string|max:50',
    //     'jk' => 'required|in:l,p',
    //     'tempat_lahir' => 'required|string|max:50',
    //     'tanggal_lahir' => 'required|date',
    //     'alamat' => 'required|string|max:225',
    //     'hp' => 'required|digits_between:6,15',
    //     'kelas_id' => 'required'
    // ]);

    // $mahasiswa = MahasiswaModel::find($id);

    // $foto_name = null;
    // if ($mahasiswa->foto && file_exists(storage_path('app/public/'.$mahasiswa->foto))) {
    //     Storage::delete('public/'. $mahasiswa->foto);
    // }
    // if ($request->hasFile('image')) {
    //     $foto_name = $request->file('image')->store('images', 'public');
    //     $mahasiswa->foto = $foto_name;
    // }

    // $mahasiswa->update($request->except(['_token', '_method', 'submit']));

    // // Jika data berhasil diupdate, akan kembali ke halaman utama
    // return redirect('mahasiswa')
    //     ->with('success', 'Mahasiswa berhasil diupdate');
    // }

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

    public function cetak_pdf($id){
        $mhs = MahasiswaModel::find($id);
        $mahasiswamatakuliah = MahasiswaMatakuliah::with('mahasiswa', 'matakuliah')->where('mahasiswa_id',  $id)->get();

        $pdf = PDF::loadview('mahasiswa.nilai_pdf',['mhs'=>$mhs, 'mhsmatkul'=>$mahasiswamatakuliah]);
        return $pdf->stream();
    }
}
