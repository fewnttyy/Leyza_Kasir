@extends('dashboard')

@section('recent-content')
<div class="content-2">
    <div class="recent-content">
        <div class="card p-5 shadow-lg" style="background-color: #ECEBDE; border-radius: 15px;">
            <h2>Transaksi Penjualan</h2>
            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div id="barang-list">
                    <div class="barang-item">
                        <select name="barang[0][id_barang]" class="form-select mb-2 barang-select" data-index="0" onchange="updateSubtotal(0)">
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->id_barang }}" data-harga="{{ $item->harga_jual }}">{{ $item->nama_barang }} (Stok: {{ $item->stok }})</option>
                            @endforeach
                        </select>
                        <input type="number" name="barang[0][kuantitas]" class="form-control mb-2 barang-kuantitas" placeholder="Kuantitas" min="1" oninput="updateSubtotal(0)">
                    </div>
                </div>
                <button type="button" id="add-barang" class="btn btn-secondary mb-3">Tambah Barang</button>

                <div class="mb-3">
                    <strong>Total Harga:</strong> Rp <span id="total-harga">0</span>
                </div>
                <input type="number" name="uang_dibayar" id="uang-dibayar" class="form-control mb-3" placeholder="Uang Dibayar" oninput="updateKembalian()">
                <div class="mb-3">
                    <strong>Kembalian:</strong> Rp <span id="kembalian">0</span>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>

            <script>
                let index = 1;

                // Fungsi untuk menambah barang baru
                document.getElementById('add-barang').addEventListener('click', () => {
                    const container = document.getElementById('barang-list');
                    const item = document.createElement('div');
                    item.classList.add('barang-item');
                    item.innerHTML = `
                        <select name="barang[${index}][id_barang]" class="form-select mb-2 barang-select" data-index="${index}" onchange="updateSubtotal(${index})">
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $item)
                            <option value="{{ $item->id_barang }}" data-harga="{{ $item->harga_jual }}">{{ $item->nama_barang }} (Stok: {{ $item->stok }})</option>
                            @endforeach
                        </select>
                        <input type="number" name="barang[${index}][kuantitas]" class="form-control mb-2 barang-kuantitas" placeholder="Kuantitas" min="1" oninput="updateSubtotal(${index})">
                    `;
                    container.appendChild(item);
                    index++;
                });

                // Fungsi untuk menghitung total harga
                function updateSubtotal(index) {
                    let totalHarga = 0;
                    const barangItems = document.querySelectorAll('.barang-item');

                    barangItems.forEach((item, i) => {
                        const select = item.querySelector(`.barang-select[data-index="${i}"]`);
                        const kuantitasInput = item.querySelector(`.barang-kuantitas`);

                        if (select && kuantitasInput) {
                            const harga = parseFloat(select.options[select.selectedIndex]?.getAttribute('data-harga')) || 0;
                            const kuantitas = parseInt(kuantitasInput.value) || 0;

                            totalHarga += harga * kuantitas;
                        }
                    });

                    document.getElementById('total-harga').textContent = totalHarga.toLocaleString('id-ID');
                    updateKembalian();
                }

                // Fungsi untuk menghitung kembalian
                function updateKembalian() {
                    const totalHarga = parseFloat(document.getElementById('total-harga').textContent.replace(/\./g, '').replace(',', '.')) || 0;
                    const uangDibayar = parseFloat(document.getElementById('uang-dibayar').value) || 0;
                    const kembalian = uangDibayar - totalHarga;

                    document.getElementById('kembalian').textContent = kembalian > 0 ? kembalian.toLocaleString('id-ID') : 0;
                }
            </script>

            <!-- Modal Struk -->
        <div class="modal fade" id="modalStruk" tabindex="-1" aria-labelledby="modalStrukLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalStrukLabel">Struk Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(session('transaksi'))
                            <p><strong>ID Transaksi:</strong> {{ session('transaksi')->id_transaksi }}</p>
                            <p><strong>Waktu:</strong> {{ session('transaksi')->created_at }}</p>
                            <p><strong>Total Harga:</strong> Rp {{ number_format(session('transaksi')->total_harga, 0, ',', '.') }}</p>
                            <p><strong>Uang Dibayar:</strong> Rp {{ number_format(session('transaksi')->uang_dibayar, 0, ',', '.') }}</p>
                            <p><strong>Kembalian:</strong> Rp {{ number_format(session('transaksi')->kembalian, 0, ',', '.') }}</p>
                            <hr>
                            <h6>Detail Barang</h6>
                            <ul>
                                @foreach(session('details') as $detail)
                                    <li>{{ $detail->barang->nama_barang }} - {{ $detail->kuantitas }} x Rp {{ number_format($detail->barang->harga_jual, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if(session('modal'))
                    let modal = new bootstrap.Modal(document.getElementById('modalStruk'));
                    modal.show();
                @endif
            });
        </script>
        </div>
</div>
@endsection
