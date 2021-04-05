@extends('template_backend.home')
@section('heading', 'Class / Kelas')
@section('page')
  <li class="breadcrumb-item active">Class</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
              <button type="button" class="btn btn-primary btn-sm" onclick="getCreateKelas()" data-toggle="modal" data-target="#form-kelas">
                  <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add Class Data
              </button>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Class</th>
                    <th>Homeroom Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>{{ $data->guru->nama_guru }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsSiswa({{$data->id}})" data-toggle="modal" data-target=".view-siswa">
                              <i class="nav-icon fas fa-users"></i> &nbsp; View Student
                            </button>
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsJadwal({{$data->id}})" data-toggle="modal" data-target=".view-jadwal">
                              <i class="nav-icon fas fa-calendar-alt"></i> &nbsp; View Schedule
                            </button>
                            <button type="button" class="btn btn-success btn-sm" onclick="getEditKelas({{$data->id}})" data-toggle="modal" data-target="#form-kelas">
                              <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                            </button>
                            <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-kelas" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="judul"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kelas.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="id" name="id">
              <div class="form-group" id="form_nama"></div>
              <div class="form-group" id="form_paket"></div>
              <div class="form-group">
                <label for="guru_id">Homeroom Teacher</label>
                <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                  <option value="">-- Select Homeroom --</option>
                  @foreach ($guru as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Back</button>
            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Add</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg view-siswa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="judul-siswa">View Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Name / Nama</th>
                    <th>L/P</th>
                    <th>Photo / Foto</th>
                  </tr>
                </thead>
                <tbody id="data-siswa">
                </tbody>
                <tfoot>
                  <tr>
                    <th>NIS</th>
                    <th>Name</th>
                    <th>L/P</th>
                    <th>Photo</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Back</button>
          <a id="link-siswa" href="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> &nbsp; PDF Download</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-xl view-jadwal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="judul-jadwal">View Schedule</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover" width="100%">
              <thead>
                <tr>
                  <th>Day</th>
                  <th>Schedule</th>
                  <th>Lesson Hours</th>
                  <th>Classroom</th>
                </tr>
              </thead>
              <tbody id="data-jadwal">
              </tbody>
              <tfoot>
                <tr>
                  <th>Day</th>
                  <th>Schedule</th>
                  <th>Lesson Hours</th>
                  <th>Classroom</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Back</button>
        <a id="link-jadwal" href="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> &nbsp; PDF Download</a>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script>
    function getCreateKelas(){
      $("#judul").text('Add Class Data');
      $('#id').val('');
      $('#form_nama').html(`
        <label for="nama_kelas">Class Name</label>
        <input type='text' id="nama_kelas" onkeyup="this.value = this.value.toUpperCase()" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">
      `);
      $('#nama_kelas').val('');
      $('#form_paket').html('');
      $('#form_paket').html(`
        <label for="paket_id">Class Level</label>
        <select id="paket_id" name="paket_id" class="select2bs4 form-control @error('paket_id') is-invalid @enderror">
          <option value="">-- Select Class Level --</option>
          @foreach ($paket as $data)
            <option value="{{ $data->id }}">{{ $data->ket }}</option>
          @endforeach
        </select>
      `);
      $('#guru_id').val('');
    }

    function getEditKelas(id){
      var parent = id;
      var form_paket = (`
        <input type="hidden" id="paket_id" name="paket_id">
        <input type="hidden" id="nama_kelas" name="nama_kelas">
      `);
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/kelas/edit/json') }}",
        success:function(result){
            // console.log(result);
          if(result){
            $.each(result,function(index, val){
              $("#judul").text('Edit Class Data ' + val.nama);
              $('#id').val(val.id);
              $('#form_nama').html('');
              $('#form_paket').html('');
              $("#form_paket").append(form_paket);
              $('#nama_kelas').val(val.nama);
              $("#paket_id").val(val.paket_id);
              $('#guru_id').val(val.guru_id);
            });
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
    }

    function getSubsSiswa(id){
      var parent = id;
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/siswa/view/json') }}",
        success:function(result){
          // console.log(result);
          var siswa = "";
          if(result){
            $.each(result,function(index, val){
              $("#judul-siswa").text('View Student Data ' + val.kelas);
              siswa += "<tr>";
                siswa += "<td>"+val.no_induk+"</td>";
                siswa += "<td>"+val.nama_siswa+"</td>";
                siswa += "<td>"+val.jk+"</td>";
                siswa += "<td><img src='"+val.foto+"' width='100px'></td>";
              siswa+="</tr>";
            });
            $("#data-siswa").html(siswa);
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
      $("#link-siswa").attr("href", "http://127.0.0.1:8000/listsiswapdf/"+id);
    }
    
    function getSubsJadwal(id){
      var parent = id;
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/jadwal/view/json') }}",
        success:function(result){
          // console.log(result);
          var jadwal = "";
          if(result){
            $.each(result,function(index, val){
              $("#judul-jadwal").text('View Schedule Data ' + val.kelas);
              jadwal += "<tr>";
                jadwal += "<td>"+val.hari+"</td>";
                jadwal += "<td><h5 class='card-title'>"+val.mapel+"</h5><p class='card-text'><small class='text-muted'>"+val.guru+"</small></p></td>";
                jadwal += "<td>"+val.jam_mulai+" - "+val.jam_selesai+"</td>";
                jadwal += "<td>"+val.ruang+"</td>";
              jadwal+="</tr>";
            });
            $("#data-jadwal").html(jadwal);
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
      $("#link-jadwal").attr("href", "http://127.0.0.1:8000/jadwalkelaspdf/"+id);
    }

    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataKelas").addClass("active");
  </script>
@endsection