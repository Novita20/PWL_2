@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
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
                <h3 class="card-title">List mahasiswa

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
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
         @endif

         <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>

          <table class="table table-bordered table-striped" id="data_mahasiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat lahir</th>
                <th>Tanggal lahir</th>
                <th>Alamat</th>
                <th>NO HP</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
            {{-- <tbody>
              @if($mhs->count() > 0)
                @foreach($mhs as $i => $m)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$m->nim}}</td>
                    <td>{{$m->nama}}</td>
                    <td>
                        @if($m->foto)
                            <img style="max-width:100px;max-height:100px" src="{{url('storage').'/'.$m->foto}}"/>
                        @endif
                    </td>
                    <td>{{$m->jk}}</td>
                    <td>{{$m->tempat_lahir}}</td>
                    <td>{{$m->tanggal_lahir}}</td>
                    <td>{{$m->alamat}}</td>
                    <td>{{$m->hp}}</td>
                    <td>{{$m->kelas !== null? $m->kelas->nama_kelas:'kosong'}}</td>
                    <td>
                      <!-- Bikin tombol edit dan delete -->
                      <a href="{{ url('/mahasiswa/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
                      <a href="{{ route('mahasiswa.show', [$m->id]) }}" class="btn btn-sm btn-info">show</a>
                       <a href="{{ route('mahasiswamatakuliah.show', [$m->id]) }}" class="btn btn-sm btn-success mr-2">nilai</a>

                      <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
              @endif
            </tbody> --}}
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
<div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" action="{{ route('mahasiswa.store') }}" role="form" class="form-horizontal" id="form_mahasiswa">
    @csrf
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>

                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="jk" name="jk" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="" />
                    </div>
                </div>

                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NO HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>



@endsection

@push('custom_js')
<script>
function updateData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
        $('#modal_mahasiswa #nomor').val($(th).data('nim'));
        $('#modal_mahasiswa #nim').val($(th).data('nim'));
        $('#modal_mahasiswa #nama').val($(th).data('nama'));
        $('#modal_mahasiswa #jk').val($(th).data('jk'));
        $('#modal_mahasiswa #tempat_lahir').val($(th).data('tempat_lahir'));
        $('#modal_mahasiswa #tanggal_lahir').val($(th).data('tanggal_lahir'));
        $('#modal_mahasiswa #alamat').val($(th).data('alamat'));
        $('#modal_mahasiswa #hp').val($(th).data('hp'));
        $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
        $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
    }

   $(document).ready(function (){
        var dataMahasiswa = $('#data_mahasiswa').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                'url': '{{  url('mahasiswa/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
            columns:[
                {data:'nomor', name:'nomor', searchable:false, sortable:false},
                {data:'nim',name:'nim', sortable: false, searchable: true},
                {data:'nama',name:'nama', sortable: false, searchable: true},
                {data:'jk',name:'jk', sortable: false, searchable: true},
                {data:'tempat_lahir',name:'tempat_lahir', sortable: false, searchable: true},
                {data:'tanggal_lahir',name:'tanggal_lahir', sortable: false, searchable: true},
                {data:'alamat',name:'alamat', sortable: false, searchable: true},
                {data:'hp',name:'hp', sortable: false, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                render: function(data, type, row, meta) {
                            var btn = `<button data-url="{{ url('/mahasiswa') }}/` + data +
                                `" class="btn btn-xs btn-warning" onclick="updateData(this)" data-id="` +
                                row.id + `" data-nim="` + row.nim + `" data-nama="` + row.nama +
                                `" data-jk="` + row.jk +
                                `" data-tempat_lahir="` + row.tempat_lahir +
                                `" data-tanggal_lahir="` + row.tanggal_lahir +
                                `" data-alamat="` + row.alamat +
                                `" data-hp="` + row.hp +
                                `"><i class="fa fa-edit"></i>
                                Edit</button>
                                <a href="{{ url('mahasiswa') }}/` + row.id + `" class="btn btn-xs btn-info"><i class="fa
                                fa-list"></i> Detail</a>
                                <form method = "POST" action = "{{ url('/mahasiswa/') }}/` + data + `">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class = "fa
                                    fa-trash"></i> Hapus</button >
                                </form>`;
                            return btn;
                        }
                },

            ]
        });
        //copy untuk mengirim data form ke server
    $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            console.log($(this).serialize());
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                        $('#form_mahasiswa').attr('action', '{{ url('mahasiswa') }}');
                        $('#form_mahasiswa').find('input[name="_method"]').remove();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                    if(data.modal_close){
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                    }

                }
            });
        });
    });




</script>
@endpush
