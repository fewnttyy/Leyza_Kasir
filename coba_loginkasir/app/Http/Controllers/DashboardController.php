<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total penjualan (jumlah transaksi) untuk user yang sedang login
        $totalPenjualan = Transaksi::where('user_id', auth()->user()->id)->count();

        // Mengambil total pendapatan (jumlah total harga yang dibayar dalam transaksi) untuk user yang sedang login
        $totalPendapatan = Transaksi::where('user_id', auth()->user()->id)->sum('uang_dibayar');

        // Mengambil transaksi terbaru untuk user yang sedang login
        $transaksiTerbaru = Transaksi::where('user_id', auth()->user()->id)->latest()->take(5)->get();

        // Mengirim data ke view
        return view('content', [
            'totalPenjualan' => $totalPenjualan,
            'totalPendapatan' => $totalPendapatan,
            'transaksiTerbaru' => $transaksiTerbaru,
        ]);
    }
}
