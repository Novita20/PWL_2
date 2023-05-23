<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Hasil Studi (KHS)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 50px auto;
            max-width: 800px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        ul li {
            list-style: none;
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            margin-top: 30px;
            width: 100%;
        }
        table th,
        table td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

    <div class="container mt-3">
        <center>
            <h3>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h3>
        </center>
        <h2 class="text-center mt-4 mb-5"><center>KARTU HASIL STUDI (KHS)</center></h2>
        <div class="row">
            <div class="col">
                <div> Nama : {{ $mhs->nama }} </div>
                <div> NIM : {{ $mhs->nim }} </div>
                <div> Kelas: {{ $mhs->kelas->nama_kelas }} </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
                <tr>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nilai</th>
                </tr>
                @if ($mhsmatkul->count() > 0)
                            @foreach ($mhsmatkul as $i)
                                <tr>
                                    <td>{{$i->matakuliah->nama_matkul}}</td>
                                    <td>{{$i->matakuliah->sks}}</td>
                                    <td>{{$i->matakuliah->semester}}</td>
                                    <td>{{$i->nilai}}</td>
                                </tr>
                            @endforeach
                     @else
                    <tr>
                        <td colspan="4" class="text-center">
                                Data Tidak ada
                        </td>
                        </tr>
                @endif
        </table>
    </div>
</body>
