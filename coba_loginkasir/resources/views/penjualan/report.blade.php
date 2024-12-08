<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { text-align: left; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Transaksi</h2>
    <p>Tanggal: {{ now()->format('d-m-Y') }}</p>
    <table>
        <thead>
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
            @foreach($transaksi as $item)
                <tr>
                    <td>{{ $item->id_transaksi }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->uang_dibayar, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->kembalian, 0, ',', '.') }}</td>
                    <td>
                        <ul>
                            @foreach($item->details as $detail)
                                <li>{{ $detail->barang->nama_barang }} x {{ $detail->kuantitas }} 
                                    (Rp {{ number_format($detail->subtotal, 0, ',', '.') }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
