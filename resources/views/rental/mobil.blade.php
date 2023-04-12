@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mobil</li>
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
                <h3 class="card-title">RENTAL MOBIL MALANG</h3>

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
            <a href="{{url('mobil/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Plat Nomor</th>
                        <th>Merk</th>
                        <th>Tipe Mobil</th>
                        <th>Status</th>
                        <th>action</th>
                       
                    </tr>
                    @foreach ($mobil as $id => $mb)
                    <tr>
                        <td>{{$mb->id}}</td>
                        <td>{{$mb->plat_nomor}}</td>
                        <td>{{$mb->tipe_mobil}}</td>
                        <td>{{$mb->merk}}</td>
                        <td>{{$mb->status}}</td>
                        <td>
                        <!-- Bikin tombol edit dan delete -->
                        <a href="{{ url('/mobil/'. $mb->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                        <form method="POST" action="{{ url('/mobil/'.$mb->id) }}" >
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
