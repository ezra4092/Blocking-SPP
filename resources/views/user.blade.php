@extends('template.main')

@section('konten')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profil Admin</h1>
            <div class="row">
                <div class="col-6">
                    <form action="/update/akun" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{Auth::user()->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{Auth::user()->username}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <button class="btn btn-warning   mt-4" type="submit">
                            <i class="fas fa-database"></i> Update
                         </button>
                    </form>
                </div>
            </div>
</div>

@if (session('akunEdit'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        icon: 'success',
        title: 'Akun berhasil diedit'
    });
</script>
@endif
@endsection
