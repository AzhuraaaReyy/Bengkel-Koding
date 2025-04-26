<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Recover Password</title>

    @include('layouts.lib.ext_css')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    {{-- Token hidden dari route parameter --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <input type="hidden" name="email" class="form-control"
                            value="{{ old('email', $email ?? '') }}"
                            placeholder="Email" required autofocus>

                    </div>



                    {{-- Password baru --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password baru" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Konfirmasi password --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                        </div>
                    </div>
                </form>



            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    @include('layouts.lib.ext_js')
</body>

</html>