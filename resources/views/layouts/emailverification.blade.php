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

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session()-> has('status'))
                <div class="alert alert-success ">
                    {{session()->get('status')}}
                </div>
                @endif

                <form action="{{ route('password.email') }}" method="post">

                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request Password Reset</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    @include('layouts.lib.ext_js')
</body>
@if(session()->has('status'))
<script>
    // Kalau session status ada (berarti sukses), mulai countdown 15 detik
    setTimeout(function() {
        window.location.href = "{{ route('login') }}"; // Redirect ke halaman login
    }, 10000);
</script>
@endif


</html>