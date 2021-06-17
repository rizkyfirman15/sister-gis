@extends('template_backend.home')
@section('heading', 'Teacher / Guru')
@section('page')
  <li class="breadcrumb-item active">Teacher</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add Teacher Data
                </button>
                <a href="{{ route('guru.export_excel') }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-file-export"></i> &nbsp; Export Excel</a>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                    <i class="nav-icon fas fa-file-import"></i> &nbsp; Import Excel
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                    <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                </button>
            </h3>
        </div>
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{ route('guru.import_excel') }}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
							@csrf
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h5 class="modal-title">Instructions :</h5>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>rows 1 = teacher name</li>
                                        <li>rows 2 = teacher nip</li>
                                        <li>rows 3 = gender</li>
                                        <li>rows 4 = subject</li>
                                    </ul>
                                </div>
                            </div>
							<label>Select excel file</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
        <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{ route('guru.deleteAll') }}">
                    @csrf
                    @method('delete')
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Sure you drop all data?</h5>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-danger">Drop</button>
						</div>
					</div>
				</form>
			</div>
		</div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Subject</th>
                    <th>View Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_mapel }}</td>
                        <td>
                            <a href="{{ route('guru.mapel', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Teacher Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_guru">Teacher Name</label>
                        <input type="text" id="nama_guru" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Place of birth</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Date of birth</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jk">Gender</label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Select Gender --</option>
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telp">Phone number</label>
                        <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address</label>
                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" id="rw" name="rw" onkeypress="return inputAngka(event)" class="form-control @error('rw') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Districts</label>
                        <input type="text" id="kecamatan" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="no_npwp">NPWP number</label>
                        <input type="text" id="no_npwp" name="no_npwp" onkeypress="return inputAngka(event)" class="form-control @error('no_npwp') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="agama">Religion</label>
                        <input type="text" id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="status_perkawinan">Marital status</label>
                        <select id="status_perkawinan" name="status_perkawinan" class="select2bs4 form-control @error('status_perkawinan') is-invalid @enderror">
                            <option value="">-- Select Marital status --</option>
                            <option value="single">Single</option>
                            <option value="marry">Marry</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nik_suami_istri">Spouse's NIK</label>
                        <input type="text" id="nik_suami_istri" name="nik_suami_istri" onkeypress="return inputAngka(event)" class="form-control @error('nik_suami_istri') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Profession</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="satuan_pendidikan_formal">Formal education unit</label>
                        <input type="text" id="satuan_pendidikan_formal" name="satuan_pendidikan_formal" class="form-control @error('satuan_pendidikan_formal') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="thn_lulus">Graduation year</label>
                        <input type="text" id="thn_lulus" name="thn_lulus" onkeypress="return inputAngka(event)" class="form-control @error('thn_lulus') is-invalid @enderror">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mapel_id">Subject</label>
                        <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                            <option value="">-- Select Subject --</option>
                            @foreach ($mapel as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Class</label>
                        <select id="kelas_id" name="kelas_id" class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                            <option value="">-- Select Class --</option>
                            @foreach ($kelas as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    @php
                        $kode = $max+1;
                        if (strlen($kode) == 1) {
                            $id_card = "0000".$kode;
                        } else if(strlen($kode) == 2) {
                            $id_card = "000".$kode;
                        } else if(strlen($kode) == 3) {
                            $id_card = "00".$kode;
                        } else if(strlen($kode) == 4) {
                            $id_card = "0".$kode;
                        } else {
                            $id_card = $kode;
                        }
                    @endphp
                    <div class="form-group">
                        <label for="id_card">ID Card number</label>
                        <input type="text" id="id_card" name="id_card" maxlength="7" onkeypress="return inputAngka(event)" value="{{ $id_card }}" class="form-control @error('id_card') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kode">Subject Code</label>
                        <input type="text" id="kode" name="kode" maxlength="3" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kode') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu_kandung">Mother name</label>
                        <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" id="rt" name="rt" onkeypress="return inputAngka(event)" class="form-control @error('rt') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Sub-district</label>
                        <input type="text" id="kelurahan" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Postal code</label>
                        <input type="text" id="kode_pos" name="kode_pos" onkeypress="return inputAngka(event)" class="form-control @error('kode_pos') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="no_kk">Family card number</label>
                        <input type="text" id="no_kk" name="no_kk" onkeypress="return inputAngka(event)" class="form-control @error('no_kk') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nama_wajib_pajak">Name of the taxpayer</label>
                        <input type="text" id="nama_wajib_pajak" name="nama_wajib_pajak" class="form-control @error('nama_wajib_pajak') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kewarganegaraan">Citizenship</label>
                        <input type="text" id="kewarganegaraan" name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nama_suami_istri">Spouse's name</label>
                        <input type="text" id="nama_suami_istri" name="nama_suami_istri" class="form-control @error('nama_suami_istri') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jenis_ptk">Kind of College</label>
                        <select id="jenis_ptk" name="jenis_ptk" class="select2bs4 form-control @error('jenis_ptk') is-invalid @enderror">
                            <option value="">-- Select Kind of College --</option>
                            <option value="PTN">PTN</option>
                            <option value="PTS">PTS</option>
                            <option value="PTK">PTK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Last education</label>
                        <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Faculty</label>
                        <input type="text" id="fakultas" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="thn_masuk">Entry year</label>
                        <input type="text" id="thn_masuk" name="thn_masuk" onkeypress="return inputAngka(event)" class="form-control @error('thn_masuk') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kependidikan">Education</label>
                        <select id="kependidikan" name="kependidikan" class="select2bs4 form-control @error('kependidikan') is-invalid @enderror">
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Input photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
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
                        <label for="akte">Input akte</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="akte" class="custom-file-input @error('akte') is-invalid @enderror" id="akte">
                                <label class="custom-file-label" for="akte">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Back</button>
              <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Add</button>
          </form>
      </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection