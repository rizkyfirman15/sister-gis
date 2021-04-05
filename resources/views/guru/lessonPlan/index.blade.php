@extends('template_backend.home')
@section('heading', 'Lesson Plan / Rencana Belajar')
@section('page')
  <li class="breadcrumb-item active">Lesson Plan</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            <a href="{{ route('lessonPlan.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add New lesson Plan</a>
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
                    <th>Teaching Strategy</th>
                    <th>Competency</th>
                    <th>Thinking Skills</th>
                    <th>Semester</th>
                    <th>Time Alocation</th>
                    <th>Learning Objective</th>
                    <th>Learning Activities</th>
                    <th>Assessment</th>
                    <th>PPT</th>
                    <th>Student Note</th>
                    <th>LKS/WS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessonPlan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->mapel->nama_mapel }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>{{ $data->teaching_strategy }}</td>
                        <td>{{ $data->metode }}</td>
                        <td>{{ $data->hot }}</td>
                        <td>{{ $data->semester }}</td>
                        <td>{{ $data->time_alocation }}</td>
                        <td>{{ $data->learning_objective }}</td>
                        <td>{{ $data->learning_activities }}</td>
                        <td>{{ $data->assessment }}</td>

                        <td>
                            <a href="{{ url ('img/lessonPlan/'.$data->ppt)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i></a>
                        </td>
                        <td>
                            <a href="{{ url ('img/lessonPlan/'.$data->study_note)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i></a>
                        </td>
                        <td>
                            <a href="{{ url ('img/lessonPlan/'.$data->lks)}}" class="btn btn-info btn-sm" target="_blank"><i class="nav-icon fas fa-download"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('lessonPlan.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i></a>
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
</div>
<!-- /.col -->
@endsection
@section('script')
    <script>
        $("#LessonPlanGuru").addClass("active");
    </script>
@endsection