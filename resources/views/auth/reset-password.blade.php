<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Forgot Password | MyApp</title>
        <!-- Custom fonts for this template-->
        <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-lMpeDgyyuLfR75tTQ3oVw2kWnJRMgxqboM2lRF3Fk/OzCm0j+jUyIYLKhIz1ZDgN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
<body class="bg-gradient-light" style="background-image: linear-gradient(147deg, #ffdec1 0%, #efd9ff 100%);">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 dhadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control form-control-user" id="username" name="username" value="{{ old('username') }}" required autofocus>
                                            @error('username')
                                            <span role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input class="form-control form-control-user" id="password" type="password" name="password" required>
                                            @error('password')
                                            <span role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                                            <input class="form-control form-control-user" id="password_confirmation" type="password" name="password_confirmation" required>
                                        </div>
                                        <div class="row ml-2">
                                            <a href="{{ route('login') }}" class="btn btn-secondary mt-4 ml-5">
                                                Kembali
                                            </a>
                                            <button class="btn btn-user btn-warning mt-4 ml-5" type="submit">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="template/vendor/boostrap/js/boostrap.bundle.min.js"></script>
    <script src="template/vendor/jquery/jquery.bundle.min.js"></script>
    <script src="template/vendor/jquery-easing/query.easing.min.js"></script>
    <script src="template/js/sb-admin-2.min.js"></script>
    <script src="/template/js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('forgot-pw'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'Password berhasil diganti'
            });
        </script>
    @endif
</body>
</html>
