@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mata Kuliah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mata Kuliah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">D-IV Teknik Informatika</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
            <a href="{{url('matkul/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Semester</th>
                        <th>action</th>

                    </tr>
                    @foreach ($mhs as $id => $m)
                    <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->nama_matkul}}</td>
                        <td>{{$m->sks}}</td>
                        <td>{{$m->jam}}</td>
                        <td>{{$m->semester}}</td>
                        <td>
                        <!-- Bikin tombol edit dan delete -->
                        <a href="{{ url('/matkul/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                        <form method="POST" action="{{ url('/matkul/'.$m->id) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                        </form>
                        </td>
                     </tr>


                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')
<script>
    alert('Selamat Datang')

</script>
@endpush
