@extends('template_backend.home')
@section('heading', 'Schedule Teacher / Jadwal Guru')
@section('heading')
    Jadwal Guru {{ Auth::user()->guru(Auth::user()->id_card)->nama_guru }}
@endsection
@section('page')
  <li class="breadcrumb-item active">Schedule Teacher</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Class</th>
                    <th>Teaching Hours</th>
                    <th>Classroom</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $data->hari->nama_hari }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruang->nama_ruang }}</td>
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
        $("#JadwalGuru").addClass("active");
    </script>
@endsection