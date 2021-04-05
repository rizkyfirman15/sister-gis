@extends('template_backend.home')
@section('heading', 'Show Behavior')
@section('page')
  <li class="breadcrumb-item active">Show Behavior</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Show Behavior</h3>
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
                        <td>Student Name</td>
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
                        <td>School Year / Tahun Pelajaran</td>
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
                            <th rowspan="2">Student Name</th>
                            <th colspan="3" class="ctr">Behavior</th>
                        </tr>
                        <tr>
                            <th class="ctr">Friend</th>
                            <th class="ctr">Alone</th>
                            <th class="ctr">Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($mapel as  $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_mapel }}</td>
                                    @php
                                        $array = array('mapel' => $data->id, 'siswa' => $siswa->id);
                                        $jsonData = json_encode($array);
                                    @endphp
                                    <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_1'] }}</td>
                                    <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_2'] }}</td>
                                    <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_3'] }}</td>
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
        $("#Sikap").addClass("active");
    </script>
@endsection
