@extends('dashboard')

@section('recent-content')
    <div class="recent-dashboard">

        <div class="recent-statistics">
            <div class="stat-card">
                <h4>Total Penjualan</h4>
                <p>{{ $totalPenjualan }} Transaksi</p> <!-- Total transaksi -->
            </div>
            <div class="stat-card">
                <h4>Total Pendapatan</h4>
                <p>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p> <!-- Total pendapatan -->
            </div>
        </div>

        <div class="recent-transactions">
            <h3>Transaksi Terbaru</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksiTerbaru as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id_transaksi }}</td> <!-- ID Transaksi -->
                            <td>{{ $transaksi->created_at->format('d M Y') }}</td> <!-- Tanggal Transaksi -->
                            <td>Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}</td> <!-- Total Pembayaran -->
                            <td>
                                @if($transaksi->status == 'Lunas')
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
