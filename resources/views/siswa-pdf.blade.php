<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tandingan Sister GIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shrotcut icon" href="{{ asset('img/logogis.png') }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">Class Student List {{ $kelas->nama_kelas }}</th>
                    </tr>
                    <tr>
                        <th style="width: 10px;">No.</th>
                        <th>Student Name</th>
                        <th>L/P</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                        <tr>
                            <td>{{ $data->no_induk }}</td>
                            <td>{{ $data->nama_siswa }}</td>
                            <td>{{ $data->jk }}</td>
                            <!-- <td><img src="{{ asset($data->foto) }}" width="100" alt=""></td> -->
                            <!-- <td><img src="{{ public_path($data->foto) }}" style="width: 80px; transform: rotate(270deg); transform-origin: 50%;" alt=""></td> -->
                            <td><img src="{{ public_path($data->foto) }}" style="width: 80;"></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center"><strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> :: <a href="">Global Indonesia School</a>. </strong></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
