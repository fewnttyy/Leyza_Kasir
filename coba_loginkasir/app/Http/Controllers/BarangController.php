<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $barang = Barang::where('user_id', Auth::id())->get();
        return view('barang.index', compact('barang'));
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama_barang' => 'required|string|max:255',
            'harga_modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $path = $request->file('foto')->store('barang', 'public');

        Barang::create([
            'user_id' => Auth::id(),
            'foto' => $path,
            'nama_barang' => $request->nama_barang,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Mengupdate data barang
    public function update(Request $request, $id)
    {
        $barang = Barang::where('id_barang', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_barang' => 'required|string|max:255',
            'harga_modal' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::delete('public/' . $barang->foto);
            }
            $barang->foto = $request->file('foto')->store('barang', 'public');
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'foto' => $barang->foto ?? $barang->foto,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus data barang
    public function destroy($id)
    {
        $barang = Barang::where('id_barang', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($barang->foto) {
            Storage::delete('public/' . $barang->foto);
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
