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
                {!! (isset($mobil))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>Plat Nomor</label>
                    <input class="form-control @error('plat_nomor') is-invalid @enderror" value="{{ isset($mobil)? $mobil->plat_nomor :old('plat_nomor') }}" name="plat_nomor" type="text"/>
                    @error('plat_nomor')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Merk</label>
                    <input class="form-control @error('merk') is-invalid @enderror" value="{{ isset($mobil)? $mobil->merk :old('merk') }}" name="merk" type="text"/>
                    @error('merk')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label>Tipe Mobil</label>
                    <input class="form-control @error('tipe_mobil') is-invalid @enderror" value="{{ isset($mobil)? $mobil->tipe_mobil :old('tipe_mobil') }}" name="tipe_mobil" type="text"/>
                    @error('tipe_mobil')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label>Status</label>
                    <input class="form-control @error('status') is-invalid @enderror" value="{{ isset($mobil)? $mobil->status :old('status') }}" name="status" type="text"/>
                    @error('status')
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