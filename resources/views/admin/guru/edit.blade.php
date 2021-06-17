@extends('template_backend.home')
@section('heading', 'Edit Teacher / Edit Guru')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Teacher</a></li>
  <li class="breadcrumb-item active">Edit Teacher</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Teacher Data</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('guru.update', $guru->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_guru">Teacher Name</label>
                    <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="mapel_id">Subject</label>
                    <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                        <option value="">-- Select Subject --</option>
                        @foreach ($mapel as $data)
                            <option value="{{ $data->id }}"
                                @if ($guru->mapel_id == $data->id)
                                    selected
                                @endif
                            >{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas_id">Class</label>
                    <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                        <option value="">-- Select Class --</option>
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}"
                                @if ($guru->kelas_id == $data->id)
                                    selected
                                @endif
                            >{{ $data->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Place of birth</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $guru->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="id_card">ID Card number</label>
                    <input type="text" id="id_card" name="id_card" class="form-control" value="{{ $guru->id_card }}">
                </div>
                <div class="form-group">
                    <label for="telp">Phone number</label>
                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" value="{{ $guru->telp }}" class="form-control @error('telp') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="alamat">Address</label>
                    <input type="text" id="alamat" name="alamat" value="{{ $guru->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="text" id="rw" name="rw" onkeypress="return inputAngka(event)" value="{{ $guru->rw }}" class="form-control @error('rw') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kecamatan">Districts</label>
                    <input type="text" id="kecamatan" name="kecamatan" value="{{ $guru->kecamatan }}" class="form-control @error('kecamatan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" onkeypress="return inputAngka(event)" value="{{ $guru->nik }}" class="form-control @error('nik') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="no_npwp">NPWP number</label>
                    <input type="text" id="no_npwp" name="no_npwp" onkeypress="return inputAngka(event)" value="{{ $guru->no_npwp }}" class="form-control @error('no_npwp') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="agama">Religion</label>
                    <input type="text" id="agama" name="agama" value="{{ $guru->agama }}" class="form-control @error('agama') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="status_perkawinan">Marital status</label>
                    <select id="status_perkawinan" name="status_perkawinan" class="select2bs4 form-control @error('status_perkawinan') is-invalid @enderror">
                        <option value="">-- Select Marital status --</option>
                        <option value="single" @if ($guru->status_perkawinan == 'single') selected @endif>Single</option>
                        <option value="marry" @if ($guru->status_perkawinan == 'marry') selected @endif>Marry</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nik_suami_istri">Spouse's NIK</label>
                    <input type="text" id="nik_suami_istri" name="nik_suami_istri" onkeypress="return inputAngka(event)" value="{{ $guru->nik_suami_istri }}" class="form-control @error('nik_suami_istri') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Profession</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $guru->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="satuan_pendidikan_formal">Formal education unit</label>
                    <input type="text" id="satuan_pendidikan_formal" name="satuan_pendidikan_formal" value="{{ $guru->satuan_pendidikan_formal }}" class="form-control @error('satuan_pendidikan_formal') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="thn_lulus">Graduation year</label>
                    <input type="text" id="thn_lulus" name="thn_lulus" onkeypress="return inputAngka(event)" value="{{ $guru->thn_lulus }}" class="form-control @error('thn_lulus') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="ktp">Input KTP</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="ktp" class="custom-file-input @error('ktp') is-invalid @enderror" id="ktp">
                            <label class="custom-file-label" for="ktp">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="npwp">Input NPWP</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="npwp" class="custom-file-input @error('npwp') is-invalid @enderror" id="npwp">
                            <label class="custom-file-label" for="npwp">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jk">Gender</label>
                    <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                        <option value="">-- Pilih Gender --</option>
                        <option value="L"
                            @if ($guru->jk == 'L')
                                selected
                            @endif
                        >Male</option>
                        <option value="P"
                            @if ($guru->jk == 'P')
                                selected
                            @endif
                        >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Date of birth</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kode">Subject Code</label>
                    <input type="text" id="kode" name="kode" class="form-control" value="{{ $guru->kode }}" disabled>
                </div>
                <div class="form-group">
                    <label for="nama_ibu_kandung">Mother name</label>
                    <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" value="{{ $guru->nama_ibu_kandung }}" class="form-control @error('nama_ibu_kandung') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="text" id="rt" name="rt" onkeypress="return inputAngka(event)" value="{{ $guru->rt }}" class="form-control @error('rt') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kelurahan">Sub-district</label>
                    <input type="text" id="kelurahan" name="kelurahan" value="{{ $guru->kelurahan }}" class="form-control @error('kelurahan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kode_pos">Postal code</label>
                    <input type="text" id="kode_pos" name="kode_pos" onkeypress="return inputAngka(event)" value="{{ $guru->kode_pos }}" class="form-control @error('kode_pos') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="no_kk">Family card number</label>
                    <input type="text" id="no_kk" name="no_kk" onkeypress="return inputAngka(event)" value="{{ $guru->no_kk }}" class="form-control @error('no_kk') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nama_wajib_pajak">Name of the taxpayer</label>
                    <input type="text" id="nama_wajib_pajak" name="nama_wajib_pajak" value="{{ $guru->nama_wajib_pajak }}" class="form-control @error('nama_wajib_pajak') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Citizenship</label>
                    <input type="text" id="kewarganegaraan" name="kewarganegaraan" value="{{ $guru->kewarganegaraan }}" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nama_suami_istri">Spouse's name</label>
                    <input type="text" id="nama_suami_istri" name="nama_suami_istri" value="{{ $guru->nama_suami_istri }}" class="form-control @error('nama_suami_istri') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="jenis_ptk">Kind of College</label>
                    <select id="jenis_ptk" name="jenis_ptk" class="select2bs4 form-control @error('jenis_ptk') is-invalid @enderror">
                        <option value="">-- Select Kind of College --</option>
                        <option value="PTN" @if ($guru->jenis_ptk == 'PTN') selected @endif>PTN</option>
                        <option value="PTS" @if ($guru->jenis_ptk == 'PTS') selected @endif>PTS</option>
                        <option value="PTK" @if ($guru->jenis_ptk == 'PTK') selected @endif>PTK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pendidikan_terakhir">Last education</label>
                    <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $guru->pendidikan_terakhir }}" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="fakultas">Faculty</label>
                    <input type="text" id="fakultas" name="fakultas" value="{{ $guru->fakultas }}" class="form-control @error('fakultas') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="thn_masuk">Entry year</label>
                    <input type="text" id="thn_masuk" name="thn_masuk" onkeypress="return inputAngka(event)" value="{{ $guru->thn_masuk }}" class="form-control @error('thn_masuk') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kependidikan">Education</label>
                    <select id="kependidikan" name="kependidikan" class="select2bs4 form-control @error('kependidikan') is-invalid @enderror">
                        <option value="">-- Select --</option>
                        <option value="Yes" @if ($guru->kependidikan == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($guru->kependidikan == 'No') selected @endif>No</option>
                    </select>
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
                    <label for="akte">Input akte</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="akte" class="custom-file-input @error('akte') is-invalid @enderror" id="akte">
                            <label class="custom-file-label" for="akte">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ijazah">Input diploma</label>
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
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Add</button>
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
        window.location="{{ route('guru.mapel', Crypt::encrypt($guru->mapel_id)) }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataGuru").addClass("active");
</script>
@endsection