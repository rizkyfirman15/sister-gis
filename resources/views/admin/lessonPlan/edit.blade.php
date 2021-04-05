@extends('template_backend.home')
@section('heading', 'Edit Lesson Plan / Edit Rencana Pelajaran')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('lessonPlan.indexAdmin') }}">Lesson Plan</a></li>
  <li class="breadcrumb-item active">Edit Lesson Plan</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Lesson Plan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('lessonPlan.updateAdmin', $lessonPlan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- @method('patch') -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="lessonPlan_id" value="{{ $lessonPlan->id }}">
                <div class="form-group">
                    <label for="mapel_id">Subject Name / Nama Mapel</label>
                    <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror select2bs4">
                      <option value="">-- Select Subject Name --</option>
                      @foreach ($mapel as $data)
                       <option value="{{ $data->id }}" @if ($lessonPlan->mapel_id == $data->id) selected @endif>{{ $data->nama_mapel }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="kelas_id">Class / Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                    <option value="">-- Select Class Name --</option>
                    @foreach ($kelas as $data)
                      <option value="{{ $data->id }}" @if ($lessonPlan->kelas_id == $data->id) selected @endif>{{ $data->nama_kelas }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="teaching_strategy">Teaching Strategy / Strategi Pengajaran</label>
                  <select id="teaching_strategy" name="teaching_strategy" class="form-control @error('teaching_strategy') is-invalid @enderror select2bs4">
                    <option value="">-- Select Teaching Strategy --</option>
                    <option value="Visualization" @if ($lessonPlan->teaching_strategy == "Visualization" || old( 'teaching_strategy' ) == "Visualization") {{ 'selected' }} @endif>Visualization / Visualisasi</option>
                    <option value="Practical Learning" @if ($lessonPlan->teaching_strategy == "Practical Learning" || old( 'teaching_strategy' ) == "Practical Learning") {{ 'selected' }} @endif>Practical Learning / Pembelajaran Praktis</option>
                    <option value="Cooperative Learning" @if ($lessonPlan->teaching_strategy == "Cooperative Learning" || old( 'teaching_strategy' ) == "Cooperative Learning") {{ 'selected' }} @endif>Cooperative Learning / Pembelajaran Kooperatif</option>
                    <option value="Collaborative Learning" @if ($lessonPlan->teaching_strategy == "Collaborative Learning" || old( 'teaching_strategy' ) == "Collaborative Learning") {{ 'selected' }} @endif>Collaborative Learning / Pembelajaran Kolaboratif</option>
                    <option value="Inquiry-Based Learning" @if ($lessonPlan->teaching_strategy == "Inquiry-Based Learning" || old( 'teaching_strategy' ) == "Inquiry-Based Learning") {{ 'selected' }} @endif>Inquiry-Based Instruction / Instruksi Berbasis Permintaan</option>
                    <option value="Interactive Learning" @if ($lessonPlan->teaching_strategy == "Interactive Learning" || old( 'teaching_strategy' ) == "Interactive Learning") {{ 'selected' }} @endif>Interactive Learning / Pembelajaran Interaktif</option>
                    <option value="Direct Instruction" @if ($lessonPlan->teaching_strategy == "Direct Instruction" || old( 'teaching_strategy' ) == "Direct Instruction") {{ 'selected' }} @endif>Direct Instruction / Instruksi Langsung</option>
                    <option value="Socratic Question" @if ($lessonPlan->teaching_strategy == "Socratic Question" || old( 'teaching_strategy' ) == "Socratic Question") {{ 'selected' }} @endif>Socratic Question / Pertanyaan Sokrates</option>
                  </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="metode">Competency / Kompetensi</label>
                  <select id="metode" name="metode" class="form-control @error('metode') is-invalid @enderror select2bs4">
                    <option value="">-- Select 4C --</option>
                    <option value="Communication" @if ($lessonPlan->metode == "Communication" || old( 'metode' ) == "Communication") {{ 'selected' }} @endif>Communication / Komunikasi</option>
                    <option value="Collaboration" @if ($lessonPlan->metode == "Collaboration" || old( 'metode' ) == "Collaboration") {{ 'selected' }} @endif>Collaboration / Kolaborasi</option>
                    <option value="Critical Thinking" @if ($lessonPlan->metode == "Critical Thinking" || old( 'metode' ) == "Critical Thinking") {{ 'selected' }} @endif>Critical Thinking / Berpikir Kritis</option>
                    <option value="Creativity" @if ($lessonPlan->metode == "Creativity" || old( 'metode' ) == "Creativity") {{ 'selected' }} @endif>Creativity / Kreativitas</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="hot">Thinking Skills / Kemampuan Berpikir</label>
                  <select id="hot" name="hot" class="form-control @error('hot') is-invalid @enderror select2bs4">
                    <option value="">-- Select Hot --</option>
                    <option value="Remembering" @if ($lessonPlan->hot == "Remembering" || old( 'hot' ) == "Remembering") {{ 'selected' }} @endif>Remembering / Mengingat</option>
                    <option value="Understanding" @if ($lessonPlan->hot == "Understanding" || old( 'hot' ) == "Understanding") {{ 'selected' }} @endif>Understanding / Pemahaman</option>
                    <option value="Applying" @if ($lessonPlan->hot == "Applying" || old( 'hot' ) == "Applying") {{ 'selected' }} @endif>Applying / Menerapkan</option>
                    <option value="Analysing" @if ($lessonPlan->hot == "Analysing" || old( 'hot' ) == "Analysing") {{ 'selected' }} @endif>Analysing / Menganalisa</option>
                    <option value="Evaluating" @if ($lessonPlan->hot == "Evaluating" || old( 'hot' ) == "Evaluating") {{ 'selected' }} @endif>Evaluating / Mengevaluasi</option>
                    <option value="Creating" @if ($lessonPlan->hot == "Creating" || old( 'hot' ) == "Creating") {{ 'selected' }} @endif>Creating / Menciptakan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="semester">Semester</label>
                  <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror select2bs4">
                    <option value="">-- Select Semester --</option>
                    <option value="1" @if ($lessonPlan->semester == "1" || old( 'semester' ) == "1") {{ 'selected' }} @endif>1</option>
                    <option value="2" @if ($lessonPlan->semester == "2" || old( 'semester' ) == "2") {{ 'selected' }} @endif>2</option>
                  </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="time_alocation">Time Alocation / Alokasi Waktu</label>
                  <input type="text" id="time_alocation" name="time_alocation" value="{{$lessonPlan->time_alocation}}" class="form-control @error('time_alocation') is-invalid @enderror" placeholder="{{ __('Time Alocation') }}">
                </div>

                <div class="form-group">
                  <label for="learning_objective">Learning Objective / Tujuan Pembelajaran</label>
                  <textarea name="learning_objective" class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" rows="8">{{ isset($lessonPlan->learning_objective) ? $lessonPlan->learning_objective : old('learning_objective')}}</textarea>
                </div>

                <div class="form-group">
                  <label for="learning_activities">Learning Activities / Kegiatan Pembelajaran</label>
                  <textarea name="learning_activities" class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" rows="8">{{ isset($lessonPlan->learning_activities) ? $lessonPlan->learning_activities : old('learning_activities')}}</textarea>
                </div>

                <div class="form-group">
                  <label for="assessment">Assessment / Penilaian</label>
                  <textarea name="assessment" class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" rows="8">{{ isset($lessonPlan->assessment) ? $lessonPlan->assessment : old('assessment')}}</textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="student_book">Student Book / Buku Siswa</label>
                  <input type="text" id="student_book" name="student_book" value="{{$lessonPlan->student_book}}" class="form-control @error('student_book') is-invalid @enderror" placeholder="{{ __('Student Book') }}">
                </div>

                <div class="form-group">
                  <label for="websik">Website</label>
                  <input type="text" id="websik" name="websik" value="{{$lessonPlan->websik}}" class="form-control @error('websik') is-invalid @enderror" placeholder="{{ __('Websik') }}">
                </div>

                <div class="form-group">
                  <label for="other">Other</label>
                  <input type="text" id="other" name="other" value="{{$lessonPlan->other}}" class="form-control @error('other') is-invalid @enderror" placeholder="{{ __('Other') }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="ppt">Input File PPT</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="ppt" class="custom-file-input @error('ppt') is-invalid @enderror" id="ppt">
                            <label class="custom-file-label" for="ppt">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="study_note">Input File Student Note</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="study_note" class="custom-file-input @error('study_note') is-invalid @enderror" id="study_note">
                            <label class="custom-file-label" for="study_note">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lks">Input File LKS/WS</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="lks" class="custom-file-input @error('lks') is-invalid @enderror" id="lks">
                            <label class="custom-file-label" for="lks">Choose file</label>
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
        window.location="{{ route('lessonPlan.indexAdmin') }}";
        });
    });
</script>
@endsection