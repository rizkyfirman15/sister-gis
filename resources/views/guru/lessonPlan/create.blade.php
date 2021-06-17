@extends('template_backend.home')
@section('heading', 'Create Lesson Plan / Buat Rencana Pelajaran')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('lessonPlan.guru') }}">Lesson Plan</a></li>
  <li class="breadcrumb-item active">Create Lesson Plan</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Create Lesson Plan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('lessonPlan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>Subject Teacher</td>
                        <td>:</td>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>{{ $guru->mapel->nama_mapel }}</td>
                    </tr>
                    <tr>
                        <td>Class Name</td>
                        <td>:</td>
                        <td>{{ $guru->kelas->nama_kelas }}</td>
                    </tr>
                    @php
                        $bulan = date('m');
                    @endphp
                    <!-- <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr> -->
                </table>
                <hr>
            </div>

            <div class="col-md-6">
                <input type="hidden" name="mapel_id" value="{{$guru->mapel->id}}">
                
                <input type="hidden" name="kelas_id" value="{{$guru->kelas->id}}">

                <div class="form-group">
                  <label for="teaching_strategy">Teaching Strategy / Strategi Pengajaran</label>
                  <select id="teaching_strategy" name="teaching_strategy" class="form-control @error('teaching_strategy') is-invalid @enderror select2bs4">
                  <option value="">-- Select Teaching Strategy --</option>
                    <option value="Visualization" @if (old( 'teaching_strategy' ) == "Visualization" ) {{ 'selected' }} @endif>Visualization / Visualisasi</option>
                    <option value="Practical Learning" @if (old( 'teaching_strategy' ) == "Practical Learning" ) {{ 'selected' }} @endif>Practical Learning / Pembelajaran Praktis</option>
                    <option value="Cooperative Learning" @if (old( 'teaching_strategy' ) == "Cooperative Learning" ) {{ 'selected' }} @endif>Cooperative Learning / Pembelajaran Kooperatif</option>
                    <option value="Collaborative Learning" @if (old( 'teaching_strategy' ) == "Collaborative Learning" ) {{ 'selected' }} @endif>Collaborative Learning / Pembelajaran Kolaboratif</option>
                    <option value="Inquiry-Based Instruction" @if (old( 'teaching_strategy' ) == "Inquiry-Based Instruction" ) {{ 'selected' }} @endif>Inquiry-Based Instruction / Instruksi Berbasis Permintaan</option>
                    <option value="Interactive Learning" @if (old( 'teaching_strategy' ) == "Interactive Learning" ) {{ 'selected' }} @endif>Interactive Learning / Pembelajaran Interaktif</option>
                    <option value="Direct Instruction" @if (old( 'teaching_strategy' ) == "Direct Instruction" ) {{ 'selected' }} @endif>Direct Instruction / Instruksi Langsung</option>
                    <option value="Socratic Question" @if (old( 'teaching_strategy' ) == "Socratic Question" ) {{ 'selected' }} @endif>Socratic Question / Pertanyaan Sokrates</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="hot">Thinking Skills / Kemampuan Berpikir</label>
                  <select id="hot" name="hot" class="form-control @error('hot') is-invalid @enderror select2bs4">
                  <option value="">-- Select Hot's --</option>
                    <option value="Remembering" @if (old( 'hot' ) == "Remembering" ) {{ 'selected' }} @endif>Remembering / Mengingat</option>
                    <option value="Understanding" @if (old( 'hot' ) == "Understanding" ) {{ 'selected' }} @endif>Understanding / Pemahaman</option>
                    <option value="Applying" @if (old( 'hot' ) == "Applying" ) {{ 'selected' }} @endif>Applying / Menerapkan</option>
                    <option value="Analysing" @if (old( 'hot' ) == "Analysing" ) {{ 'selected' }} @endif>Analysing / Menganalisa</option>
                    <option value="Evaluating" @if (old( 'hot' ) == "Evaluating" ) {{ 'selected' }} @endif>Evaluating / Mengevaluasi</option>
                    <option value="Creating" @if (old( 'hot' ) == "Creating" ) {{ 'selected' }} @endif>Creating / Menciptakan</option>
                  </select>
                </div>
            </div>

            <div class="col-md-6">
                @php
                  $bulan = date('m');
                @endphp
                <!-- <div class="form-group">
                  <label for="semester">Semester</label>
                  <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror select2bs4">
                    <option value="">-- Select Semester --</option>
                    <option value="1" @if (old( 'semester' ) == "1" ) {{ 'selected' }} @endif>1</option>
                    <option value="2" @if (old( 'semester' ) == "2" ) {{ 'selected' }} @endif>2</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <input type="text" id="semester" name="semester" value="@if ($bulan > 6) {{ 'Semester Ganjil' }} @else {{ 'Semester Genap' }} @endif" class="form-control @error('semester') is-invalid @enderror" placeholder="{{ __('Semester') }}" readonly>
                </div>

                <div class="form-group">
                  <label for="metode">Competency / Kompetensi</label>
                  <select id="metode" name="metode" class="form-control @error('metode') is-invalid @enderror select2bs4">
                  <option value="">-- Select 4C --</option>
                    <option value="Communication" @if (old( 'metode' ) == "Communication" ) {{ 'selected' }} @endif>Communication / Komunikasi</option>
                    <option value="Collaboration" @if (old( 'metode' ) == "Collaboration" ) {{ 'selected' }} @endif>Collaboration / Kolaborasi</option>
                    <option value="Critical Thinking" @if (old( 'metode' ) == "Critical Thinking" ) {{ 'selected' }} @endif>Critical Thinking / Berpikir Kritis</option>
                    <option value="Creativity" @if (old( 'metode' ) == "Creativity" ) {{ 'selected' }} @endif>Creativity / Kreativitas</option>
                  </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="time_alocation">Time Alocation / Alokasi Waktu</label>
                    <input type="number" id="time_alocation" name="time_alocation" onkeypress="return inputAngka(event)" class="form-control @error('time_alocation') is-invalid @enderror" placeholder="{{ __('Time Alocation') }}">
                </div>

                <div class="form-group">
                  <label for="learning_objective">Learning Objective / Tujuan Pembelajaran</label>
	                <textarea class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" name="learning_objective" rows="8">{{ old('learning_objective') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="learning_activities">Learning Activities / Kegiatan Pembelajaran</label>
	                <textarea class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" name="learning_activities" rows="8" >{{ old('learning_activities') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="assessment">Assessment / Penilaian</label>
	                <textarea class="form-control" id="exampleInputMeans" placeholder="Ketikkan sesuatu" name="assessment" rows="8">{{ old('assessment') }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="student_book">Student Book / Buku Siswa</label>
                  <input type="text" id="student_book" name="student_book" class="form-control @error('student_book') is-invalid @enderror" placeholder="{{ __('Student Book') }}">
                </div>

                <div class="form-group">
                  <label for="websik">Website</label>
                  <input type="text" id="websik" name="websik" class="form-control @error('websik') is-invalid @enderror" placeholder="{{ __('Websik') }}">
                </div>

                <div class="form-group">
                  <label for="other">Other</label>
                  <input type="text" id="other" name="other" class="form-control @error('other') is-invalid @enderror" placeholder="{{ __('Other') }}">
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
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Submit</button>
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
        window.location="{{ route('lessonPlan.guru') }}";
        });
    });
</script>
@endsection