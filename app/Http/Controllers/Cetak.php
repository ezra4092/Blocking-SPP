<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class Cetak extends Controller
{
    public function cetakPdf()
    {
        // Buat instance Dompdf
        $dompdf = new Dompdf();

        // Render view ke dalam HTML
        $html = view('nama_view')->render();

        // Muat HTML ke dalam Dompdf
        $dompdf->loadHtml($html);

        // Atur ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Keluarkan atau unduh PDF
        return $dompdf->stream('file_cetak.pdf');
    }
}
