@extends('template_backend.home')
@section('heading', 'Student Details / Detail Siswa')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Student</a></li>
  <li class="breadcrumb-item active">Student Details</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('siswa.kelas', Crypt::encrypt($siswa->kelas_id)) }}" class="btn btn-default btn-sm"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Back</a>
        </div>
        <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-4">
                    <img src="{{ asset($siswa->foto) }}"  
                        class="card-img img-details rounded" 
                        alt="...">
                    <br>
                    <br>
                    @if($siswa->dataPribadi->kk)
                        <img src="{{ url ('/uploads/siswa/dataPribadi'.$siswa->dataPribadi->kk) }}"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @else
                        <img src="/img/default.jpg"  
                                class="card-img img-details rounded" 
                                alt="...">
                    @endif
                    <br>
                    <br>
                    @if($siswa->dataPribadi->ijazah)
                        <img src="{{ url ('/uploads/siswa/dataPribadi'.$siswa->dataPribadi->ijazah) }}"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @else
                        <img src="/img/default.jpg"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @endif
                    <br>
                    <br>
                    @if($siswa->dataPribadi->akte)
                        <img src="{{ url ('/uploads/siswa/dataPribadi'.$siswa->dataPribadi->akte) }}"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @else
                        <img src="/img/default.jpg"  
                                class="card-img img-details rounded" 
                                alt="...">
                    @endif
                    <br>
                    <br>
                    @if($siswa->dataPribadi->raport_terakhir)
                        <img src="{{ url ('/uploads/siswa/dataPribadi'.$siswa->dataPribadi->raport_terakhir) }}"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @else
                        <img src="/img/default.jpg"  
                                class="card-img img-details rounded" 
                                alt="...">
                    @endif
                    <br>
                    <br>
                    @if($siswa->sekolah->document)
                        <img src="{{ url ('/uploads/siswa/dataPribadi/'.$siswa->sekolah->document) }}"  
                            class="card-img img-details rounded" 
                            alt="...">
                    @else
                        <img src="/img/default.jpg"  
                                class="card-img img-details rounded" 
                                alt="...">
                    @endif
                    <br>
                    
                </div>
                <div class="col-md-1 mb-4"></div>
                    <div class="col-md-3">
                        <h5><u>Personal Data</u></h5>
                        <div class="card" style="width: 25rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name : {{ $siswa->nama_siswa }}</li>
                                <li class="list-group-item">Email : {{ $siswa->user->email }}</li>
                                <li class="list-group-item">Identity Number : {{ $siswa->no_induk }}</li>
                                <li class="list-group-item">Class : {{ $siswa->kelas->nama_kelas }}</li>
                                @if ($siswa->jk == 'L')
                                <li class="list-group-item">Gender : Male</li>
                                @else
                                <li class="list-group-item">Gender : Female</li>
                                @endif
                                <li class="list-group-item">Place of birth : {{ $siswa->tmp_lahir }}</li>
                                <li class="list-group-item">Date of birth : {{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</li>
                                <li class="list-group-item">Address : {{ $siswa->dataPribadi->alamat }} RT {{ $siswa->dataPribadi->rt }}/{{ $siswa->dataPribadi->rw }} {{ $siswa->dataPribadi->kecamatan }},{{ $siswa->dataPribadi->kelurahan }} {{ $siswa->dataPribadi->kode_pos }}</li>
                                <li class="list-group-item">Anak Ke : {{ $siswa->dataPribadi->anak_ke }}</li>
                                <li class="list-group-item">Number of siblings : {{ $siswa->dataPribadi->jumlah_saudara_kandung }}</li>
                                <li class="list-group-item">Hobby : {{ $siswa->dataPribadi->hobby }}</li>
                                <li class="list-group-item">Ambition : {{ $siswa->dataPribadi->cita_cita }}</li>
                                <li class="list-group-item">Parent email : {{ $siswa->dataPribadi->parent_email }}</li>
                                <li class="list-group-item">School name : {{ $siswa->sekolah->name }}</li>
                                <li class="list-group-item">School address : {{ $siswa->sekolah->alamat }}</li>
                                <li class="list-group-item">Diploma number : {{ $siswa->sekolah->no_ijazah }}</li>
                                <li class="list-group-item">Average value : {{ $siswa->sekolah->rata_rata_nilai }}</li>
                                <li class="list-group-item">Date of entry : {{ date('l, d F Y', strtotime($siswa->sekolah->tgl_masuk)) }}</li>
                                <li class="list-group-item">Out date : {{ date('l, d F Y', strtotime($siswa->sekolah->tgl_keluar)) }}</li>
                                <li class="list-group-item">SKHUN number : {{ $siswa->sekolah->no_skhun }}</li>
                                <li class="list-group-item">Father name : {{ $siswa->ayah->name }}</li>
                                <li class="list-group-item">NIK number : {{ $siswa->ayah->nik }}</li>
                                <li class="list-group-item">Place of birth : {{ $siswa->ayah->tmp_lahir }}</li>
                                <li class="list-group-item">Date of birth : {{ date('l, d F Y', strtotime($siswa->ayah->tgl_lahir)) }}</li>
                                <li class="list-group-item">Education : {{ $siswa->ayah->pendidikan }}</li>
                                <li class="list-group-item">Profession : {{ $siswa->ayah->pekerjaan }}</li>
                                <li class="list-group-item">Religion : {{ $siswa->ayah->agama }}</li>
                                <li class="list-group-item">Phone number : {{ $siswa->ayah->number_phone }}</li>
                                <li class="list-group-item">Salary : {{ $siswa->ayah->penghasilan }}</li>
                                <li class="list-group-item">Mother name : {{ $siswa->ibu->name }}</li>
                                <li class="list-group-item">NIK number : {{ $siswa->ibu->nik }}</li>
                                <li class="list-group-item">Place of birth : {{ $siswa->ibu->tmp_lahir }}</li>
                                <li class="list-group-item">Date of birth : {{ date('l, d F Y', strtotime($siswa->ibu->tgl_lahir)) }}</li>
                                <li class="list-group-item">Education : {{ $siswa->ibu->pendidikan }}</li>
                                <li class="list-group-item">Profession : {{ $siswa->ibu->pekerjaan }}</li>
                                <li class="list-group-item">Religion : {{ $siswa->ibu->agama }}</li>
                                <li class="list-group-item">Phone number : {{ $siswa->ibu->number_phone }}</li>
                                <li class="list-group-item">Salary : {{ $siswa->ibu->penghasilan }}</li>
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
        $("#DataSiswa").addClass("active");
    </script>
@endsection