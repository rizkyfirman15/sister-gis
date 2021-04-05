@extends('template_backend.home')
@section('heading', 'Trash Student')
@section('page')
  <li class="breadcrumb-item active">Trash Student</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Trash Student Data</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Identity Number / Nomor Induk</th>
                    <th>Class</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->no_induk }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>
                        <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_siswa }}" data-gallery="gallery" data-footer='<a href="{{ route('siswa.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Change Photo</a>'>
                            <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('siswa.kill', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('siswa.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                            <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#ViewTrash").addClass("active");
        $("#liViewTrash").addClass("menu-open");
        $("#TrashSiswa").addClass("active");
    </script>
@endsection