@extends('template_backend.home')
@section('heading', 'Edit Student / Edit Siswa')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Student</a></li>
  <li class="breadcrumb-item active">Edit Student</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Student Data</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_induk">NIS</label>
                    <input type="text" id="no_induk" name="no_induk" value="{{ $siswa->no_induk }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Student Name</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" class="form-control @error('nama_siswa') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="jk">Gender</label>
                    <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                        <option value="">-- Select Gender --</option>
                        <option value="L"
                            @if ($siswa->jk == 'L')
                                selected
                            @endif
                        >Male</option>
                        <option value="P"
                            @if ($siswa->jk == 'P')
                                selected
                            @endif
                        >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Place of birth</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $siswa->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="no_registrasi_akta">No Registrasi akta</label>
                    <input type="text" id="no_registrasi_akta" name="no_registrasi_akta" value="{{ $siswa->dataPribadi->no_registrasi_akta }}" onkeypress="return inputAngka(event)" class="form-control @error('no_registrasi_akta') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="anak_ke">Anak ke-</label>
                    <input type="text" id="anak_ke" name="anak_ke" value="{{ $siswa->dataPribadi->anak_ke }}" onkeypress="return inputAngka(event)" class="form-control @error('anak_ke') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="cita_cita">Ambition</label>
                    <input type="text" id="cita_cita" name="cita_cita" value="{{ $siswa->dataPribadi->cita_cita }}" class="form-control @error('cita_cita') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="alamat">Address</label>
                    <input type="text" id="alamat" name="alamat" value="{{ $siswa->dataPribadi->alamat }}" onkeypress="return inputAngka(event)" class="form-control @error('alamat') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="text" id="rw" name="rw" value="{{ $siswa->dataPribadi->rw }}" onkeypress="return inputAngka(event)" class="form-control @error('rw') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kecamatan">Districts</label>
                    <input type="text" id="kecamatan" name="kecamatan" value="{{ $siswa->dataPribadi->kecamatan }}" class="form-control @error('kecamatan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">School name</label>
                    <input type="text" id="name" name="name" value="{{ $siswa->sekolah->name }}" class="form-control @error('name') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="no_ijazah">Diploma number</label>
                    <input type="text" id="no_ijazah" name="no_ijazah" value="{{ $siswa->sekolah->no_ijazah }}" onkeypress="return inputAngka(event)" class="form-control @error('no_ijazah') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="rata_rata_nilai">Average value</label>
                    <input type="text" id="rata_rata_nilai" name="rata_rata_nilai" value="{{ $siswa->sekolah->rata_rata_nilai }}" onkeypress="return inputAngka(event)" class="form-control @error('rata_rata_nilai') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_keluar">Out date</label>
                    <input type="date" id="tgl_keluar" name="tgl_keluar" value="{{ $siswa->sekolah->tgl_keluar }}" class="form-control @error('tgl_keluar') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nik">Father NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $siswa->ayah->nik }}" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pendidikan">Education</label>
                    <input type="text" id="pendidikan" name="pendidikan" value="{{ $siswa->ayah->pendidikan }}" class="form-control @error('pendidikan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Date of birth</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->ayah->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="agama">Religion</label>
                    <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                        <option value="">-- Select Religion --</option>
                        <option value="Islam" @if ($siswa->ayah->agama == 'Islam') selected  @endif>Islam</option>
                        <option value="Kristen" @if ($siswa->ayah->agama == 'Kristen') selected  @endif>Kristen</option>
                        <option value="Budha" @if ($siswa->ayah->agama == 'Budha') selected  @endif>Budha</option>
                        <option value="Hindu" @if ($siswa->ayah->agama == 'Hindu') selected  @endif>Hindu</option>
                        <option value="Kong hu cu" @if ($siswa->ayah->agama == 'Kong hu cu') selected  @endif>Kong hu cu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Mother name</label>
                    <input type="text" id="name" name="name" value="{{ $siswa->ibu->name }}" class="form-control @error('name') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Profession</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $siswa->ibu->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="number_phone">Mother phone number</label>
                    <input type="text" id="number_phone" name="number_phone" value="{{ $siswa->ibu->number_phone }}" onkeypress="return inputAngka(event)" class="form-control @error('number_phone') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Place of birth</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $siswa->ibu->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="penghasilan">Salary</label>
                    <input type="text" id="penghasilan" name="penghasilan" value="{{ $siswa->ibu->penghasilan }}" class="form-control @error('penghasilan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="akte">Input akte</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="akte" class="custom-file-input @error('akte') is-invalid @enderror" id="akte">
                            <label class="custom-file-label" for="akte">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="raport_terakhir">Input raport</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="raport_terakhir" class="custom-file-input @error('raport_terakhir') is-invalid @enderror" id="raport_terakhir">
                            <label class="custom-file-label" for="raport_terakhir">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kelas_id">Class</label>
                    <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                        <option value="">-- Pilih Class --</option>
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}"
                                @if ($siswa->kelas_id == $data->id)
                                    selected
                                @endif
                            >{{ $data->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="telp">Phone number</label>
                    <input type="text" id="telp" name="telp" value="{{ $siswa->telp }}" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Date of birth</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="agama">Religion</label>
                    <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                        <option value="">-- Select Religion --</option>
                        <option value="Islam" @if ($siswa->dataPribadi->agama == 'Islam') selected  @endif>Islam</option>
                        <option value="Kristen" @if ($siswa->dataPribadi->agama == 'Kristen') selected  @endif>Kristen</option>
                        <option value="Budha" @if ($siswa->dataPribadi->agama == 'Budha') selected  @endif>Budha</option>
                        <option value="Hindu" @if ($siswa->dataPribadi->agama == 'Hindu') selected  @endif>Hindu</option>
                        <option value="Kong hu cu" @if ($siswa->dataPribadi->agama == 'Kong hu cu') selected  @endif>Kong hu cu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hobby">Hobby</label>
                    <input type="text" id="hobby" name="hobby" value="{{ $siswa->dataPribadi->hobby }}" class="form-control @error('hobby') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="jumlah_saudara_kandung">Number of siblings</label>
                    <input type="text" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" value="{{ $siswa->dataPribadi->jumlah_saudara_kandung }}" onkeypress="return inputAngka(event)" class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="parent_email">Parent email</label>
                    <input type="text" id="parent_email" name="parent_email" value="{{ $siswa->dataPribadi->parent_email }}" class="form-control @error('parent_email') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="text" id="rt" name="rt" value="{{ $siswa->dataPribadi->rt }}" onkeypress="return inputAngka(event)" class="form-control @error('rt') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kelurahan">Sub-districts</label>
                    <input type="text" id="kelurahan" name="kelurahan" value="{{ $siswa->dataPribadi->kelurahan }}" class="form-control @error('kelurahan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kode_pos">Postal code</label>
                    <input type="text" id="kode_pos" name="kode_pos" value="{{ $siswa->dataPribadi->kode_pos }}" onkeypress="return inputAngka(event)" class="form-control @error('kode_pos') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="alamat">School address</label>
                    <input type="text" id="alamat" name="alamat" value="{{ $siswa->sekolah->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="no_skhun">SKHUN number</label>
                    <input type="text" id="no_skhun" name="no_skhun" value="{{ $siswa->sekolah->no_skhun }}" onkeypress="return inputAngka(event)" class="form-control @error('no_skhun') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_masuk">Date of entry</label>
                    <input type="date" id="tgl_masuk" name="tgl_masuk" value="{{ $siswa->sekolah->tgl_masuk }}" class="form-control @error('tgl_masuk') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="name">Father name</label>
                    <input type="text" id="name" name="name" value="{{ $siswa->ayah->name }}" class="form-control @error('name') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Profession</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $siswa->ayah->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="number_phone">Father phone number</label>
                    <input type="text" id="number_phone" name="number_phone" value="{{ $siswa->ayah->number_phone }}" onkeypress="return inputAngka(event)" class="form-control @error('number_phone') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Place of birth</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $siswa->ayah->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="penghasilan">Salary</label>
                    <input type="text" id="penghasilan" name="penghasilan" value="{{ $siswa->ayah->penghasilan }}" class="form-control @error('penghasilan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nik">Mother NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $siswa->ibu->nik }}" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pendidikan">Education</label>
                    <input type="text" id="pendidikan" name="pendidikan" value="{{ $siswa->ibu->pendidikan }}" class="form-control @error('pendidikan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Date of birth</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->ibu->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="agama">Religion</label>
                    <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                        <option value="">-- Select Religion --</option>
                        <option value="Islam" @if ($siswa->ibu->agama == 'Islam') selected  @endif>Islam</option>
                        <option value="Kristen" @if ($siswa->ibu->agama == 'Kristen') selected  @endif>Kristen</option>
                        <option value="Budha" @if ($siswa->ibu->agama == 'Budha') selected  @endif>Budha</option>
                        <option value="Hindu" @if ($siswa->ibu->agama == 'Hindu') selected  @endif>Hindu</option>
                        <option value="Kong hu cu" @if ($siswa->ibu->agama == 'Kong hu cu') selected  @endif>Kong hu cu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="document">Input document</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="document" class="custom-file-input @error('document') is-invalid @enderror" id="document">
                            <label class="custom-file-label" for="document">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kk">Input KK</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="kk" class="custom-file-input @error('kk') is-invalid @enderror" id="kk">
                            <label class="custom-file-label" for="kk">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ijazah">Input ijazah</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="ijazah" class="custom-file-input @error('ijazah') is-invalid @enderror" id="ijazah">
                            <label class="custom-file-label" for="ijazah">Choose file</label>
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
        window.location="{{ route('siswa.kelas', Crypt::encrypt($siswa->kelas_id)) }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataSiswa").addClass("active");
</script>
@endsection