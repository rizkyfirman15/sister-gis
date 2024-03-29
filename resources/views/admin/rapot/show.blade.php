@extends('template_backend.home')
@section('heading', 'Show Report Cards')
@section('page')
  <li class="breadcrumb-item active">Show Report Cards</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Show Report Cards</h3>
      </div>
      <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td>{{ $siswa->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td> 
                    </tr>
                    <tr>
                        <td>Homeroom Teacher</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>
                    @php
                        $bulan = date('m');
                        $tahun = date('Y');
                    @endphp
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>School Year</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                            @else
                                {{ $tahun-1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Subject</th>
                            <th class="ctr" colspan="3">Knowledge</th>
                            <th class="ctr" colspan="3">Skills</th>
                        </tr>
                        <tr>
                            <th class="ctr">Score</th>
                            <th class="ctr">Predicate</th>
                            <th class="ctr">Description</th>
                            <th class="ctr">Score</th>
                            <th class="ctr">Predicate</th>
                            <th class="ctr">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($mapel as $val => $data)
                                <?php $data = $data[0]; ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->mapel->nama_mapel }}</td>
                                    @php
                                        $array = array('mapel' => $val, 'siswa' => $siswa->id);
                                        $jsonData = json_encode($array);
                                    @endphp
                                    <td class="ctr">{{ $data->cekRapot($jsonData)['p_nilai'] }}</td>
                                    <td class="ctr">{{ $data->cekRapot($jsonData)['p_predikat'] }}</td>
                                    <td>{{ $data->cekRapot($jsonData)['p_deskripsi'] }}</td>
                                    <td class="ctr">{{ $data->cekRapot($jsonData)['k_nilai'] }}</td>
                                    <td class="ctr">{{ $data->cekRapot($jsonData)['k_predikat'] }}</td>
                                    <td>{{ $data->cekRapot($jsonData)['k_deskripsi'] }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Rapot").addClass("active");
    </script>
@endsection
