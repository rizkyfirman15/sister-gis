@extends('template_backend.home')
@section('heading', 'Syllabus Teacher / Silabus Guru')
@section('page')
  <li class="breadcrumb-item active">Syllabus Teacher</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Syllabus</th>
                    <th>Teacher Book</th>
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
                            <a href="{{ url ('img/syllabus/'.$data->book_indo_guru)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Indonesian Book</a>
                            <a href="{{ url ('img/syllabus/'.$data->book_english_guru)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; English Book</a>
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
@endsection
@section('script')
    <script>
        $("#SyllabusGuru").addClass("active");
    </script>
@endsection