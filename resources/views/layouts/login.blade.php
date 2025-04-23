<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Aplikasi</title>

  <!-- Google Font: Source Sans Pro -->
  @include('layouts.lib.ext_css')
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Bengkel</b>Koding</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Login Dulu Boy</p>

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="text-right mb-3 ">
            <p class="mb-1 "><a href="/recoverypassword" class="forget-password">forgot password?</a></p>

          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

          </div>
        </form>
        <div class="d-flex align-items-center my-3">
          <hr class="flex-grow-1">
          <span class="px-2 text-muted">OR</span>
          <hr class="flex-grow-1">
        </div>
        <div class="social-auth-links text-center">
          <a href="/auth/redirect" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign in using Google+
          </a>
        </div>
        <div class="text-center mt-3">
          <span style="color:gray;">Don’t have an acount?</span>
          <a href="/register" class="register">Register </a>
        </div>

      </div>
    </div>
  </div>

  <!-- jQuery -->
  @include('layouts.lib.ext_js')
</body>

</html>