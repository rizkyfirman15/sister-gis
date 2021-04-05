@extends('template_backend.home')
@section('heading', 'Edit Syllabus')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('syllabus.index') }}">Syllabus</a></li>
  <li class="breadcrumb-item active">Edit Syllabus</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Syllabus</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('syllabus.update', $syllabus->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="syllabus_id" value="{{ $syllabus->id }}">
                <div class="form-group">
                  <label for="kelas_id">Class</label>
                  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                    <option value="">-- Select Class Name --</option>
                    @foreach ($kelas as $data)
                      <option value="{{ $data->id }}" @if ($syllabus->kelas_id == $data->id) selected @endif>{{ $data->nama_kelas }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="mapel_id">Subject Name</label>
                    <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror select2bs4">
                      <option value="">-- Select Subject Name --</option>
                      @foreach ($mapel as $data)
                       <option value="{{ $data->id }}" @if ($syllabus->mapel_id == $data->id) selected @endif>{{ $data->nama_mapel }}</option>
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
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Back</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('syllabus.index') }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataSyllabus").addClass("active");
</script>
@endsection