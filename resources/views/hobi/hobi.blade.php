@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hobi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hobi</li>
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
                <h3 class="card-title">Title</h3>

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
            <a href="{{url('hobi/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>nama</th>
                        <th>hobi</th>
                        <th>action</th>
                        
                    </tr>
                    @foreach ($hobi as $id => $k)
                    <tr>
                        <td>{{$k->id}}</td>
                        <td>{{$k->nama}}</td>
                        <td>{{$k->hobi}}</td>
                    <td>
                        <!-- Bikin tombol Edit dan Delete-->
                        <a href="{{ url('/hobi/'. $k->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
  
                        <form method="POST" action="{{ url('/hobi/'.$k->id) }}" >
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
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
