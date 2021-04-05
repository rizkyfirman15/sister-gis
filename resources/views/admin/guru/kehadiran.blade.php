@extends('template_backend.home')
@section('heading', 'Teacher Attendance / Absensi Guru')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('guru.absensi') }}">Teacher Attendance</a></li>
    <li class="breadcrumb-item active">{{ $guru->nama_guru }}</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Back</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absen as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('l, d F Y', strtotime($data->tanggal)) }}</td>
                    <td>{{ $data->kehadiran->ket }}</td>
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
        $("#AbsensiGuru").addClass("active");
    </script>
@endsection