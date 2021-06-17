@extends('template_backend.home')
@section('heading', 'Teacher Details / Detail Guru')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Teacher</a></li>
  <li class="breadcrumb-item active">Teacher Details</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route("guru.mapel", Crypt::encrypt($guru->mapel_id)) }}" class="btn btn-default btn-sm"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Back</a>
        </div>
        <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-2">
                    <img src="{{ asset($guru->foto) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br><br>
                    <img src="{{ url ('/uploads/guru/'.$guru->ktp) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br><br>
                    <img src="{{ url ('/uploads/guru/'.$guru->kk) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br><br>
                    <img src="{{ url ('/uploads/guru/'.$guru->npwp) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br><br>
                    <img src="{{ url ('/uploads/guru/'.$guru->ijazah) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br><br>
                    <img src="{{ url ('/uploads/guru/'.$guru->akte) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                </div>
                <div class="col-md-1 mb-4"></div>
                <div class="col-md-3">
                    <h5><u>Personal Data</u></h5>
                    <div class="card" style="width: 25rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name / Nama : {{ $guru->nama_guru }}</li>
                        <li class="list-group-item">ID Card number / No Id Card : {{ $guru->id_card }}</li>
                        <li class="list-group-item">Teacher Subject / Guru Mapel : {{ $guru->mapel->nama_mapel }}</li>
                        <li class="list-group-item">Class / Kelas : {{ $guru->kelas->nama_kelas }}</li>
                        <li class="list-group-item">Subject Code / Kode Mapel : {{ $guru->kode }}</li>
                        @if ($guru->jk == 'L')
                        <li class="list-group-item">Gender / Jenis Kelamin : Male</li>
                        @else
                        <li class="list-group-item">Gender / Jenis Kelamin : Female</li>
                        @endif
                        <li class="list-group-item">Place of birth / Tempat Lahir : {{ $guru->tmp_lahir }}</li>
                        <li class="list-group-item">Date of birth / Tanggal Lahir : {{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</li>
                        <li class="list-group-item">Phone number / No. Telepon : {{ $guru->telp }}</li>
                        <li class="list-group-item">Mother name / Nama Ibu : {{ $guru->nama_ibu_kandung }}</li>
                        <li class="list-group-item">Address / Alamat : {{ $guru->alamat }} RT/RW {{ $guru->rt }} / {{ $guru->rw }} {{$guru->kelurahan }}, {{ $guru->kecamatan }} {{ $guru->kode_pos }}</li>
                        <li class="list-group-item">NIK number / No.NIK : {{ $guru->nik }}</li>
                        <li class="list-group-item">KK number / No.KK : {{ $guru->no_kk }}</li>
                        <li class="list-group-item">NPWP number / No.NPWP : {{ $guru->no_npwp }}</li>
                        <li class="list-group-item">Name of the taxpayer / Nama Wajib Pajak : {{ $guru->nama_wajib_pajak }}</li>
                        <li class="list-group-item">Religion / Agama : {{ $guru->agama }}</li>
                        <li class="list-group-item">Citizenship / Kewarganegaraan : {{ $guru->kewarganegaraan }}</li>
                        <li class="list-group-item">Marital status / Status Perkawinan : {{ $guru->status_perkawinan }}</li>
                        <li class="list-group-item">Spouse's name / Nama Pasangan : {{ $guru->nama_suami_istri }}</li>
                        <li class="list-group-item">Spouse's NIK / NIK Pasangan : {{ $guru->nik_suami_istri }}</li>      
                        <li class="list-group-item">Profession / Pekerjaan : {{ $guru->pekerjaan }}</li>
                        <li class="list-group-item">Kind of College / Jenis Perguruan Tinggi : {{ $guru->jenis_ptk }}</li>
                        <li class="list-group-item">Last education / Pendidikan Terakhir : {{ $guru->pendidikan_terakhir }}</li>
                        <li class="list-group-item">Formal education unit / Satuan Pendidikan Formal : {{ $guru->satuan_pendidikan_formal }}</li>
                        <li class="list-group-item">Faculty / Fakultas : {{ $guru->fakultas }}</li>
                        <li class="list-group-item">Entry year / Tahun Masuk : {{ $guru->thn_masuk }}</li>
                        <li class="list-group-item">Graduation year / Tahun Lulus : {{ $guru->thn_lulus }}</li>
                        <li class="list-group-item">Education / Kependidikan : {{ $guru->kependidikan }}</li>
                    </ul>
                    </div>
                </div>
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