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
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

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

      <form class="form-sys" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.form-login -->

      <p class="mb-1">
        <a href="/forgot_password">Lupa Password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Daftar</a>
      </p>
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
