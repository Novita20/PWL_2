@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MataKuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MataKuliah</li>
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
          <h3 class="card-title">kelas : TI-2A</h3>

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
        
            <form method="POST" action="{{ $url_form}}">
                @csrf
                {!! (isset($mataKuliah))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>MataKuliah</label>
                    <input class="form-control @error('mataKuliah') is-invalid @enderror" value="{{ isset($mataKuliah)? $mataKuliah->mataKuliah :old('mataKuliah') }}" name="mataKuliah" type="text"/>
                    @error('mataKuliah')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pengajar</label>
                    <input class="form-control @error('pengajar') is-invalid @enderror" value="{{ isset($pengajar)? $pengajar->pengajar :old('pengajar') }}" name="pengajar" type="text"/>
                    @error('pengajar')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
                
                
            </form>
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