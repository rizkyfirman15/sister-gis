@extends('template_backend.home')
@section('heading', 'Exam / Ulangan')
@section('page')
  <li class="breadcrumb-item active">Exam</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Exam</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Class Name</th>
                  <th>Action</th>
              </thead>
              <tbody>
                @foreach ($kelas as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td><a href="{{ route('ulangan-siswa', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Details</a></td>
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
      $("#Ulangan").addClass("active");
    </script>
@endsection