<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default.jpg') }}" class=" img-circle elevation-2" alt="User Image">
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
                        <div class="cover-photo position-relative" style="background-image: url('{{ Auth::user()->cover_photo ? asset('storage/' . Auth::user()->cover_photo) : asset('images/default.jpg') }}'); ">

                            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default.jpg') }}" class="profile-pic" alt="Profile Picture">


                            <div class="position-absolute start-50 translate-middle-x text-center" style="top: 55%;">
                                <h4 class="mb-0 text-white">{{ Auth::user()->nama }}</h4>
                                <small class="text-white-50">UI/UX Designer</small>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary btn-sm me-2" style="padding: 5px;" data-bs-toggle="modal" data-bs-target="#edit">
                                        Edit Profile
                                    </button>
                                    <button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#editCoverPhotoModal">
                                        Edit Cover Photo
                                    </button>
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

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true" style="margin-top:60px; margin-left: 60px">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <label for="inputNamalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" value=" {{ Auth::user()->nama }}" class="form-control" id="inputNamalengkap" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value=" {{ Auth::user()->email }}" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="**********" class="form-control" id="inputpassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputNo_Hp" class="col-sm-2 col-form-label">No_Hp</label>
                                <div class="col-sm-10">
                                    <input type="text" name="no_hp" value=" {{ Auth::user()->no_hp }}" class="form-control" id="inputNo_Hp" placeholder="No_hp">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <input type="text" name="role" value=" {{ Auth::user()->role }}" class="form-control" id="inputRole" placeholder="Role" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputphoto" class="col-sm-2 col-form-label">FotoProfile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="photo" type="file" id="inputphoto" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="inputAlamat" placeholder=" {{ Auth::user()->alamat }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="offset-sm-2 col-sm-10">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>

        <div class="modal fade" id="editCoverPhotoModal" tabindex="-1" aria-labelledby="editCoverPhotoModalLabel" aria-hidden="true" style=" margin-left: 60px">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editCoverPhotoModalLabel">Change Cover Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="coverPhotoForm">
                            <div class="mb-3">
                                <input class="form-control" type="file" id="coverPhotoInput" accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary btn-sm" onclick="changeCoverPhoto()">Save</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
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
    <script>
        function changeCoverPhoto() {
            const input = document.getElementById('coverPhotoInput');
            const file = input.files[0];

            if (file) {
                let formData = new FormData();
                formData.append('cover_photo', file);

                fetch('/upload-cover-photo', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Memperbarui gambar cover foto
                            const coverPhotoElement = document.querySelector('.cover-photo');
                            coverPhotoElement.style.backgroundImage = `url('${data.cover_photo_url}')`;

                            // Menutup modal
                            var modal = bootstrap.Modal.getInstance(document.getElementById('editCoverPhotoModal'));
                            modal.hide();
                        } else {
                            alert('Upload gagal!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>

</body>

</html>