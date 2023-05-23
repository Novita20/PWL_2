@extends('layout.template')
@section('content')
<div class="container mt-5">
<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header">
Detail Mahasiswa
</div>
<div class="card-body">
<ul class="list-group list-group-flush">
<li class="list-group-item"><b>Nim: </b>{{$mhs->nim}}</li>
<li class="list-group-item"><b>Nama: </b>{{$mhs->nama}}</li>
<li class="list-group-item"><b>Foto: </b><br>
    @if ($mhs->foto)
        <img style="max-width:100px;max-height:100px" src="{{url('storage').'/'.$mhs->foto}}" />
    @else
        Foto tidak tersedia
    @endif
</li>
<li class="list-group-item"><b>Kelas: </b>{{$mhs->kelas->nama_kelas}}</li>
<li class="list-group-item"><b>JK: </b> @if($mhs->jk=='p')
    Perempuan
    @elseif($mhs->jk=='l')
    Laki-Laki
@endif</li>
<li class="list-group-item"><b>Tempat Lahir: </b>{{$mhs->tempat_lahir}}</li>
<li class="list-group-item"><b>Tanggal Lahir: </b>{{$mhs->tanggal_lahir}}</li>
<li class="list-group-item"><b>HP: </b>{{$mhs->hp}}</li>

</ul>
</div>
<a class="btn btn-success mt-3" href="{{ route('mahasiswa') }}">Kembali</a>
</div>
</div>
</div>
@endsection
