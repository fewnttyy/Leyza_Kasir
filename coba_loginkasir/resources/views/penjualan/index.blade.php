@extends('dashboard')

@section('recent-content')
<div class="content-2">
    <div class="recent-content">
    <h2 class="text-center">Riwayat Penjualan</h2>
        <a href="{{ route('transaksi.report') }}">
            <button type="submit" class="btn btn-danger btn-sm" style="font-size: 14px; height: 30px; display: flex; align-items: center; justify-content: center;">Download PDF</button>
        </a>

        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal & Waktu</th>
                    <th>Total Harga</th>
                    <th>Uang Dibayar</th>
                    <th>Kembalian</th>
                    <th>Detail Barang</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $item)
                    <tr>
                        <td>{{ $item->id_transaksi }}</td>
                        <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->uang_dibayar, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->kembalian, 0, ',', '.') }}</td>
                        <td>
                            <ul>
                                @foreach($item->details as $detail)
                                    <li>
                                        {{ $detail->barang->nama_barang }} x {{ $detail->kuantitas }} 
                                        (Rp {{ number_format($detail->subtotal, 0, ',', '.') }})
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada riwayat penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
