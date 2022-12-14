<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function invoice()
    {
        // dd(session('keranjang'));
        $data = session('keranjang');
        $pdf = Pdf::loadView('page.invoice.invoice', [ 'data'=> $data]);
        return $pdf->stream('invoice.pdf');
    }
    public function LaporanPenjualan(Request $request){
        $bayar = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('payment_status', [2, 3]);
        })->get();
        if ($request->start != null && $request->end != null) {
            $bayar = Transaksi::whereBetween('tgl_transaksi', [$request->start, $request->end])
                ->whereHas('pembayaran', function ($query) {
                    $query->whereIn('payment_status', [2, 3]);
                })->get();
        }
        $pdf = Pdf::loadView('page.invoice.pdf', [ 'data'=> $bayar]);
        return $pdf->stream('Penjualan.pdf');
    }
    public function LaporanBarangMasuk(Request $request){
        $bayar = BarangMasuk::with(['barang'])->whereBetween('tgl_masuk', [$request->start, $request->end])->get();
        if($request->start == "" && $request->end == ''){
            $bayar= BarangMasuk::with(['barang'])->get();
        }
        $pdf = Pdf::loadView('page.invoice.barangmasuk', [ 'data'=> $bayar]);
        return $pdf->stream('Penjualan.pdf');
    }
    public function LaporanBarangKeluar(Request $request){
        $bayar = BarangKeluar::with(['barang'])->whereBetween('tgl_keluar', [$request->start, $request->end])->get();
        if($request->start == "" && $request->end == ''){
            $bayar= BarangKeluar::with(['barang'])->get();
        }
        $pdf = Pdf::loadView('page.invoice.barangkeluar', [ 'data'=> $bayar]);
        return $pdf->stream('Penjualan.pdf');
    }
}
