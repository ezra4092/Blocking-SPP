@extends('template.main')
@section('konten')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
    <p class="mb-4">Manajemen Spp | Inventory Spp</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pembayaran as $row)
                        <tr>
                            <td width="5%">{{$no++}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->tgl_bayar}}</td>
                            <td>Rp. {{$row->jumlah}}</td>
                            <td class="row">
                                <form action="{{route('pembayaran.delete', $row->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fa-solid fa-trash-can mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></button>
                                </form>
                                <button class="btn btn-sm btn-warning fa-solid fa-pen-to-square mr-2" data-toggle="modal" data-target="#editData{{$row->id}}"></button>
                                <button class="btn btn-sm btn-secondary fa-solid fa-print" onclick="printTable(this.parentNode.parentNode)"></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="editData{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataLabel{{$row->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('pembayaran.update', $row->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="nama">Nama Siswa</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="{{$row->nama}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_bayar">Tanggal Pembayaran</label>
                                                <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{$row->tgl_bayar}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$row->jumlah}}">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah --}}
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('pembayaran/save')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('dataTambah'))
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
        title: 'Data berhasil ditambahkan'
    });
</script>
@endif
@if ($message = Session::get('dataDelete'))
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
        title: 'Data berhasil dihapus'
    });
</script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function printTable(row) {
        var nama = row.querySelector('td:nth-child(2)').innerText.trim();
        var tgl_bayar = row.querySelector('td:nth-child(3)').innerText.trim();
        var jumlah = row.querySelector('td:nth-child(4)').innerText.trim();

        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><title>Laporan</title></head><body>');

        newWin.document.write('<h1>Laporan Pembayaran SPP</h1>');
        newWin.document.write('<p>Nama Siswa         : ' + nama + '</p>');
        newWin.document.write('<p>Tanggal Pembayaran : ' + tgl_bayar + '</p>');
        newWin.document.write('<p>Jumlah             : ' + jumlah + '</p>');
        newWin.document.write('<hr>');

        newWin.document.write('</body></html>');
        newWin.document.close();
        newWin.print();
        setTimeout(function () { newWin.close(); }, 10);
    }
</script>

@endsection
