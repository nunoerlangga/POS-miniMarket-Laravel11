<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
   <b>Admin</b><span>LTE</span>
  </div>
  <!-- /.register-logo -->
  <div class="register-box-body">
    <p class="register-box-msg">Sign in to start your session</p>

    <!-- Form reg -->
    <form action="{{ url('register') }}" method="POST">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama_user" placeholder="Nama User" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select name="role" class="form-control">
            <option value="" disabled selected hidden>Pilih role</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
          </select>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      

    <!-- Social register Links -->
    <div class="social-auth-links text-center">
      <p>- OR -</p>
<a href="{{ url('login') }}" class="btn btn-danger btn-block btn-flat">Login</a>
    </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.register-box-body -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('assets') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('assets') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('assets') }}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
