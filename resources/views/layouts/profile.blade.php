<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .cover-photo {
            height: 300px;
            /* lebih tinggi supaya muat semua */
            background-image: url('/images/profile.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            color: white;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            bottom: 140px;
            left: 50%;
            transform: translateX(-50%);
        }


        .about-icon {
            font-size: 30px;
            color: purple;
        }

        .about-card {
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
    </style>

    @include('layouts.lib.ext_css')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            @include('layouts.header')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ url('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
                    </div>
                </div>

                <!-- SidebarSearch -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @include('layouts.sidebar_menu')
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Profile Page</h1>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Profile Section -->
                    <div class="card mb-4">
                        <div class="cover-photo position-relative">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="profile-pic" alt="Profile Picture">
                            <div class="position-absolute start-50 translate-middle-x text-center" style="top: 55%;">
                                <h4 class="mb-0 text-white">{{ Auth::user()->nama }}</h4>
                                <small class="text-white-50">UI/UX Designer</small>
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-sm me-2">Edit Profile</button>
                                    <button class="btn btn-outline-light btn-sm">Edit Cover Photo</button>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- About Section -->
                    <div class="mt-4">
                        <h5>About</h5>
                        <div class="row g-3">
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-person-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Nama Lengkap</small><br>
                                        {{ Auth::user()->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-envelope-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Email</small><br>
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-person-badge-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Role</small><br>
                                        {{ Auth::user()->role }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-telephone-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Phone</small><br>
                                        {{ Auth::user()->no_hp }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-shield-lock-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Password</small><br>
                                        **********
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="about-card d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill about-icon me-2"></i>
                                    <div>
                                        <small class="text-muted">Address</small><br>
                                        {{ Auth::user()->alamat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div><!-- ./wrapper -->

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>