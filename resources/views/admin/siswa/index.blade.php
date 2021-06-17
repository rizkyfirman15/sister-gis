@extends('template_backend.home')
@section('heading', 'Student / Siswa')
@section('page')
  <li class="breadcrumb-item active">Student</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Add Student Data
                </button>
                <a href="{{ route('siswa.export_excel') }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-file-export"></i> &nbsp; Export Excel</a>
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
				<form method="post" action="{{ route('siswa.import_excel') }}" enctype="multipart/form-data">
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
                                        <li>rows 1 = student name</li>
                                        <li>rows 2 = nis</li>
                                        <li>rows 3 = gender</li>
                                        <li>rows 4 = class name</li>
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
				<form method="post" action="{{ route('siswa.deleteAll') }}">
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
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('siswa.kelas', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Details</a>
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
<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Student Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_induk">NIS</label>
                        <input type="text" id="no_induk" name="no_induk" onkeypress="return inputAngka(event)" class="form-control @error('no_induk') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">Student Name</label>
                        <input type="text" id="nama_siswa" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror">
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
                        <label for="tmp_lahir">Place of birth</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
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
                    <div class="form-group">
                        <label for="telp">Phone number</label>
                        <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('number_phone') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Date of birth</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="hobby">Hobby</label>
                        <input type="text" id="hobby" name="hobby" class="form-control @error('hobby') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="cita_cita">Ambition</label>
                        <input type="text" id="cita_cita" name="cita_cita" class="form-control @error('cita_cita') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="parent_email">Parent email</label>
                        <input type="email" id="parent_email" name="parent_email" class="form-control @error('parent_email') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="name">School name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="rata_rata_nilai">Average value</label>
                        <input type="number" id="rata_rata_nilai" name="rata_rata_nilai" onkeypress="return inputAngka(event)" class="form-control @error('rata_rata_nilai') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="alamat">School Address</label>
                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="no_skhun">SKHUN Number</label>
                        <input type="text" id="no_skhun" name="no_skhun" class="form-control @error('no_skhun') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="name">Father Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Place of birth</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Date Of birth</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Education</label>
                        <input type="text" id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="name">Mother Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK mother</label>
                        <input type="number" id="nik" name="nik" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Place of birth</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Date Of birth</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
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
                    <div class="form-group">
                        <label for="document">Input document</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="document" class="custom-file-input @error('document') is-invalid @enderror" id="document">
                                <label class="custom-file-label" for="document">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_registrasi_akta">No Registrasi Akta</label>
                        <input type="number" id="no_registrasi_akta" name="no_registrasi_akta" onkeypress="return inputAngka(event)" class="form-control @error('no_registrasi_akta') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="number" id="rt" name="rt" class="form-control @error('rt') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="number" id="rw" name="rw" class="form-control @error('rw') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="agama">Religion</label>
                        <select id="agama" name="agama" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Select Religion --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Kong hu cu">Kong hu cu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Districts</label>
                        <input type="text" id="kecamatan" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Sub-districts</label>
                        <input type="text" id="kelurahan" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Postal Code</label>
                        <input type="number" id="kode_pos" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="anak_ke">Anak ke-</label>
                        <input type="number" id="anak_ke" name="anak_ke" onkeypress="return inputAngka(event)" class="form-control @error('anak_ke') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_saudara_kandung">Number of siblings</label>
                        <input type="number" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" onkeypress="return inputAngka(event)" class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address</label>
                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="no_ijazah">Diploma Number</label>
                        <input type="text" id="no_ijazah" name="no_ijazah" class="form-control @error('no_ijazah') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Date Of Entry</label>
                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="tgl_keluar">Out Date</label>
                        <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK father</label>
                        <input type="number" id="nik" name="nik" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Profession</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="agama">Religion</label>
                        <select id="agama" name="agama" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Select Religion --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Kong hu cu">Kong hu cu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_phone">Phone number</label>
                        <input type="number" id="number_phone" name="number_phone" onkeypress="return inputAngka(event)" class="form-control @error('number_phone') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="penghasilan">Salary</label>
                        <input type="text" id="penghasilan" name="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Profession</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="agama">Religion</label>
                        <select id="agama" name="agama" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Select Religion --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Kong hu cu">Kong hu cu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_phone">Phone number</label>
                        <input type="number" id="number_phone" name="number_phone" onkeypress="return inputAngka(event)" class="form-control @error('number_phone') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Education</label>
                        <input type="text" id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="penghasilan">Salary</label>
                        <input type="text" id="penghasilan" name="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="foto">Input foto</label>
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
        $("#DataSiswa").addClass("active");
    </script>
@endsection