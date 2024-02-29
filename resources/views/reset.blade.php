<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reset Password | MyApp</title>
    <!-- Custom fonts for this template -->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-light" style="background-image: linear-gradient(147deg, #ffdec1 0%, #efd9ff 100%);">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="username" name="username" id="username" class="form-control form-control-user" placeholder="Username" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_password" id="new_password" class="form-control form-control-user" placeholder="Password Baru" required>
                                        </div>
                                        <input type="submit" value="Reset Password" class="btn btn-warning btn-user btn-block">
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="template/js/sb-admin-2.min.js"></script>
    <script src="template/js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
    });
    </script>
    @endif
</body>
</html>
