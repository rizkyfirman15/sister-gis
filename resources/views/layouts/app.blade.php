
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Tandingan Sister GIS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shrotcut icon" href="{{ asset('img/logogis.png') }}">
</head>
<body class="hold-transition login-page" style="background-image: url('{{ asset("img/wallup.jpg") }}'); background-size: cover; background-attachment: fixed;">
  <div class="login-box">
    <div class="login-logo">
      {{-- <img src="{{ asset('img/logosister.png') }}" width="60%" alt=""> --}}
    </div>

    <div class="login-logo" style="color: white;">
      @yield('page')
    </div>

    <div class="card">
      @yield('content')
    </div>

    <footer style="color: white;">
      <marquee>
          <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> &diams; <a href="http://smkn1jenpo.sch.id/" style="color: white;">Global Indonesia School</a>. </strong>
      </marquee>
    </footer>
  </div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- page script -->
<script>
  $(document).ready(function(){
      $('#role').change(function(){
          var kel = $('#role option:selected').val();
          if (kel == "Guru") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
              `);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
          } else if(kel == "Siswa") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            `);
            $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
          } else {
            $('#noId').removeClass("mb-3");
            $('#noId').html('');
          }
      });
  });
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
</script>
@yield('script')

@error('id_card')
  <script>
    toastr.error("Sorry. This user is not registered as a Global Indonesia School Teacher!");
  </script>
@enderror
@error('guru')
  <script>
    toastr.error("Sorry, this teacher is already registered as a user!");
  </script>
@enderror
@error('no_induk')
  <script>
    toastr.error("Sorry. This user is not registered as a Global Indonesia School Student!");
  </script>
@enderror
@error('siswa')
  <script>
    toastr.error("Sorry. This student is already registered as a User!");
  </script>
@enderror
@if (session('status'))
  <script>
    toastr.success("{{ Session('success') }}");
  </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session('error') }}");
    </script>
@endif

</body>
</html>
