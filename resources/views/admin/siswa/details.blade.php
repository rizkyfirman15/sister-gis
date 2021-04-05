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
                </div>
                <div class="col-md-1 mb-4"></div>
                    <div class="col-md-3">
                        <h5><u>Personal Data</u></h5>
                        <div class="card" style="width: 25rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name : {{ $siswa->nama_siswa }}</li>
                            <li class="list-group-item">Identity Number : {{ $siswa->no_induk }}</li>
                            <li class="list-group-item">Class : {{ $siswa->kelas->nama_kelas }}</li>
                            @if ($siswa->jk == 'L')
                            <li class="list-group-item">Gender : Male</li>
                            @else
                            <li class="list-group-item">Gender : Female</li>
                            @endif
                            <li class="list-group-item">Place of birth : {{ $siswa->tmp_lahir }}</li>
                            <li class="list-group-item">Date of birth : {{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</li>
                            <li class="list-group-item">Phone number : {{ $siswa->telp }}</li>
                        </ul>
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