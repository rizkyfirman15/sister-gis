@extends('template_backend.home')
@section('heading', 'Report Cards')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('rapot-kelas') }}">Report Cards</a></li>
  <li class="breadcrumb-item active">{{ $kelas->nama_kelas }}</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
            <a href="{{ route('rapot-kelas') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Back</a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>NIS</th>
                  <th>Action</th>
              </thead>
              <tbody>
                @foreach ($siswa as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->no_induk }}</td>
                    <td><a href="{{ route('rapot-show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Show Report</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Rapot").addClass("active");
    </script>
@endsection