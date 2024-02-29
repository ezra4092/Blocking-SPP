<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1, shrink-to-fit=no">

<meta name="description" content="">
<meta name="author" content="">
<title>Login | MyApp</title>
<!-- Custom fonts for this template-->
<link href="template/vendor/fontawesome-free/css/all.min.css"
rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i

,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

rel="stylesheet">
<!-- Custom styles for this template-->
<link href="template/css/sb-admin-2.min.css" rel="stylesheet">
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="<?php echo e(url('login/proses')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Username" autofocus required value="<?php echo e(old('username')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password" required>
                                    </div>
                                    <input type="submit" name="login" value="Login" class="btn btn-warning btn-user btn-block">
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo e(url('reset-password')); ?>" style="color: black;">Lupa Password?</a>
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

    
    <script src="template/vendor/boostrap/js/boostrap.bundle.min.js"></script>
    <script src="template/vendor/jquery/jquery.bundle.min.js"></script>
    <script src="template/vendor/jquery-easing/query.easing.min.js"></script>
    <script src="template/js/sb-admin-2.min.js"></script>
    <script src="template/js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(session('error')): ?>
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
    })
    Toast.fire({
        icon: 'error',
        title: 'Username atau Password salah. Silahkan login kembali'
    });
</script>
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\Laravel\spp\resources\views/login.blade.php ENDPATH**/ ?>