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
      <form action="{{ route('guru.update', $guru->id) }}" method="post">
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
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)" value="{{ $guru->nip }}" class="form-control @error('nip') is-invalid @enderror" disabled>
                </div>
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