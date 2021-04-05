
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
            <a href="{{ route('lessonPlan.createAdmin') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add New lesson Plan</a>
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
                            <a href="{{ route('lessonPlan.editAdmin', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                            <br>
                            <button type="button" class="btn btn-danger btn-sm mt-2" data-toggle="modal" data-target="#modal-notification{{$data->id}}"><i class="nav-icon fas fa-trash-alt"></i></button>
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

<!-- Delete Syllabus -->
@foreach($lessonPlan as $key => $data)
<div class="modal fade" id="modal-notification{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification">Warning</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <form action="{{ route('lessonPlan.destroyAdmin', $data->id) }}" method="post">
            @csrf @method('delete')
                <div class="modal-body">
                    
                    <div class="py-3 text-center">
                        <i class="fa fa-trash fa-3x"></i>
                        <h4 class="heading mt-4">Do you want to delete lesson plan data with assessment {{$data->assessment}}?</h4>
                        <p>Data that has been deleted cannot be restored, make sure you are correct in deleting data.</p>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning btn-sm">Ok, Next</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endforeach
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataLessonPlan").addClass("active");
    </script>
@endsection