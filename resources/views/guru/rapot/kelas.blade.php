@extends('template_backend.home')
@section('heading', 'Report Value / Nilai Rapot')
@section('page')
  <li class="breadcrumb-item active">Report Value</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12" style="margin-top: -21px;">
                <table class="table">
                    <tr>
                        <td>Teacher Name</td>
                        <td>:</td>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>{{ $guru->mapel->nama_mapel }}</td>
                    </tr>
                </table>
                <hr>
            </div>
            <div class="col-md-12">
              <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Class Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($kelas as $val => $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                      <td><a href="{{ route('rapot.show', Crypt::encrypt($val)) }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i> &nbsp; Entry Value</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <script>
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#RapotGuru").addClass("active");
  </script>
@endsection