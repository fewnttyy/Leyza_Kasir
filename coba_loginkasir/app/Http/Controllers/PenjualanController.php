<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    // read
    public function index()
    {
        $transaksi = Transaksi::where('user_id', auth()->id())
            ->with('details.barang') // Pastikan relasi sudah terdefinisi di model
            ->orderBy('created_at', 'desc') // Urutkan dari transaksi terbaru
            ->get();

        return view('penjualan.index', compact('transaksi'));
    }


    // create
    public function create()
    {
        // Ambil barang milik user yang sedang login
        $barang = Barang::where('user_id', auth()->id())->get();
        return view('penjualan.create', compact('barang'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'barang' => 'required|array',
            'barang.*.id_barang' => 'required|exists:barang,id_barang',
            'barang.*.kuantitas' => 'required|integer|min:1',
            'uang_dibayar' => 'required|numeric|min:0',
        ]);

        $total_harga = 0;
        foreach ($request->barang as $item) {
            $barang = Barang::findOrFail($item['id_barang']);
            $subtotal = $barang->harga_jual * $item['kuantitas'];
            $total_harga += $subtotal;
        }

        if ($request->uang_dibayar < $total_harga) {
            return back()->withErrors(['uang_dibayar' => 'Uang yang diberikan kurang dari total harga!']);
        }

        // Buat transaksi
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total_harga' => $total_harga,
            'uang_dibayar' => $request->uang_dibayar,
            'kembalian' => $request->uang_dibayar - $total_harga,
        ]);

        $barang_details = [];
        foreach ($request->barang as $item) {
            $barang = Barang::findOrFail($item['id_barang']);
            $detail = DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_barang' => $barang->id_barang,
                'kuantitas' => $item['kuantitas'],
                'subtotal' => $barang->harga_jual * $item['kuantitas'],
            ]);
            $barang_details[] = $detail;
            $barang->decrement('stok', $item['kuantitas']);
        }

        return redirect()
            ->route('penjualan.create')
            ->with([
                'success' => 'Transaksi berhasil disimpan!',
                'transaksi' => $transaksi,
                'details' => $barang_details,
                'modal' => true // Tambahkan indikator untuk memunculkan modal
            ]);

    }

    // report
    public function generateReport()
{
    $transaksi = Transaksi::where('user_id', auth()->id())
        ->with('details.barang')
        ->orderBy('created_at', 'desc')
        ->get();

    $pdf = Pdf::loadView('penjualan.report', compact('transaksi'))
        ->setPaper('a4', 'landscape');

    return $pdf->download('Laporan_Transaksi_' . now()->format('Ymd_His') . '.pdf');
}

}
