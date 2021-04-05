@extends('template_backend.home')
@section('heading', 'Syllabus')
@section('page')
  <li class="breadcrumb-item active">Syllabus</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".tambah-syllabus">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add New Syllabus
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Subject Name</th>
                    <th>Class</th>
                    <th>Syllabus</th>
                    <th>Student Book</th>
                    <th>Teacher Book</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($syllabus as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->mapel->nama_mapel }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>
                            <a href="{{ url ('img/syllabus/'.$data->syllabus)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Download</a>
                        </td>
                        <td>
                            <a href="{{ url ('img/syllabus/'.$data->book_indo_siswa)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Indonesian</a>
                            <a href="{{ url ('img/syllabus/'.$data->book_english_siswa)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; English</a>
                        </td>
                        <td>
                            <a href="{{ url ('img/syllabus/'.$data->book_indo_guru)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Indonesian</a>
                            <a href="{{ url ('img/syllabus/'.$data->book_english_guru)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; English</a>
                        </td>
                        <td>
                            <a href="{{ route('syllabus.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                            <!-- <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Delete</button> -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-notification{{$data->id}}"><i class="nav-icon fas fa-trash-alt"></i> &nbsp;Delete</button>
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
<div class="modal fade bd-example-modal-md tambah-syllabus" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add New Syllabus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('syllabus.store') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="kelas_id">Class</label>
                  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                    <option value="">-- Select Class Name --</option>
                    @foreach ($kelas as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="mapel_id">Subject Name</label>
                    <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                      <option value="">-- Select Subject Name --</option>
                      @foreach ($mapel as $data)
                       <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="syllabus">Input File Syllabus</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="syllabus" class="custom-file-input @error('syllabus') is-invalid @enderror" id="syllabus">
                            <label class="custom-file-label" for="syllabus">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_indo_siswa">Input File Book Indo Student</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="book_indo_siswa" class="custom-file-input @error('book_indo_siswa') is-invalid @enderror" id="book_indo_siswa">
                            <label class="custom-file-label" for="book_indo_siswa">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_english_siswa">Input File Book English Student</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="book_english_siswa" class="custom-file-input @error('book_english_siswa') is-invalid @enderror" id="book_english_siswa">
                            <label class="custom-file-label" for="book_english_siswa">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_indo_guru">Input File Book Indo Teacher</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="book_indo_guru" class="custom-file-input @error('book_indo_guru') is-invalid @enderror" id="book_indo_guru">
                            <label class="custom-file-label" for="book_indo_guru">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_english_guru">Input File Book English Teacher</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="book_english_guru" class="custom-file-input @error('book_english_guru') is-invalid @enderror" id="book_english_guru">
                            <label class="custom-file-label" for="book_english_guru">Choose file</label>
                        </div>
                    </div>
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

<!-- Delete Syllabus -->
@foreach($syllabus as $key => $data)
<div class="modal fade" id="modal-notification{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Peringatan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <form action="{{ route('syllabus.destroy', $data->id) }}" method="post">
            @csrf @method('delete')
                <div class="modal-body">
                    
                    <div class="py-3 text-center">
                        <i class="fa fa-trash fa-3x"></i>
                        <h4 class="heading mt-4">Apa anda ingin menghapus data syllabus dengan judul {{$data->judul}}?</h4>
                        <p>Data yang telah dihapus tidak akan bisa dikembalikan, pastikan anda benar dalam menghapus data.</p>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning btn-sm">Ok, Lanjutkan</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modal-notification{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('syllabus.destroy', $data->id) }}">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa anda ingin menghapus data syllabus dengan judul {{$data->judul}}?</h5>
                    <p>Data yang telah dihapus tidak akan bisa dikembalikan, pastikan anda benar dalam menghapus data.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div> -->
@endforeach
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSyllabus").addClass("active");
    </script>
@endsection