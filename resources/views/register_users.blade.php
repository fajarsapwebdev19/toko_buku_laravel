<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- Bootstrap Notify -->
  <link rel="stylesheet" href="{{asset('bootstrap-notify/bootstrap-notify.min.css')}}">
  </head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card mt-5 mb-5">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register</p>

      <style>
        label.error{
            color: #dc3545;
            font-size: 14px;
        }

        input.error{
            border: 1px solid #dc3545;
        }

        input.error:focus{
            border: 1px solid #dc3545;
        }

        input.valid, input.valid:focus{
            border: 1px solid #28a745;
        }
      </style>

      <form class="form-register-users" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="">Nama Sekolah</label>
            <input type="text" name="school_name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Jenis Kelamin</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                    <label class="form-check-label" for="inlineRadio1">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                    <label class="form-check-label" for="inlineRadio2">P</label>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" id="pw" name="password" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="row">
          <div class="col-8">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> --}}
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.form-login -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('bootstrap-notify/bootstrap-notify-custom.js')}}"></script>

<!-- jquery validate -->
<script src="{{asset('jquery.validate.min.js')}}"></script>
<script src="{{asset('additional-methods.min.js')}}"></script>
<script src="{{asset('function.js')}}"></script>
<script src="{{asset('auth.js')}}"></script>
</body>
</html>
