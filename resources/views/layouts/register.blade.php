<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>
    @include('layouts.lib.ext_css')

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('daftar') }}" method="post" onsubmit="return validatePasswords()">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Full name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
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
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>


                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small id="password-error" style="color:red; display:none;">Password tidak cocok!</small>
                    <div class="input-group mb-3">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" pattern="^\d{12,13}$" title="Nomor HP harus terdiri dari 12 atau 13 digit angka" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <script>
                        function validatePasswords() {
                            const password = document.getElementById("password").value;
                            const confirmPassword = document.getElementById("password_confirmation").value;
                            const error = document.getElementById("password-error");

                            if (password !== confirmPassword) {
                                error.style.display = "block"; // tampilkan pesan error
                                return false; // cegah submit form
                            } else {
                                error.style.display = "none"; // sembunyikan pesan error
                                return true; // izinkan form disubmit
                            }
                        }
                    </script>

                </form>

                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1">
                    <span class="px-2 text-muted">OR</span>
                    <hr class="flex-grow-1">
                </div>
                <div class="social-auth-links text-center">
                    <a href="/auth/redirect" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign Up using Google+
                    </a>
                </div>
                <span style="color:gray;">Already have an acount?</span>
                <a href="/" class="register"> Login </a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @include('layouts.lib.ext_js')
</body>

</html>