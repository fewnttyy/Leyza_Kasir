@extends('dashboard')

@section('recent-content')

    <div class="recent-content">
        <h1>Daftar Barang</h1>

        <!-- Tombol untuk membuka modal create -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Barang
        </button>

        <!-- Modal untuk create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Barang</label>
                                <input type="file" name="foto" id="foto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_modal" class="form-label">Harga Modal</label>
                                <input type="number" name="harga_modal" id="harga_modal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel data -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Barang" style="width: 80px; height: auto;">
                            @else
                                Tidak Ada Foto
                            @endif
                        </td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>Rp{{ number_format($item->harga_modal, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_barang }}">
                                Edit
                            </button>

                            <!-- Modal untuk edit -->
                            <div class="modal fade" id="editModal{{ $item->id_barang }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id_barang }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id_barang }}">Edit Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('barang.update', $item->id_barang) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="foto_{{ $item->id_barang }}" class="form-label">Foto Barang</label>
                                                    <input type="file" name="foto" id="foto_{{ $item->id_barang }}" class="form-control">
                                                    @if($item->foto)
                                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_barang }}" class="mt-2" style="width: 100px;">
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_barang_{{ $item->id_barang }}" class="form-label">Nama Barang</label>
                                                    <input type="text" name="nama_barang" id="nama_barang_{{ $item->id_barang }}" class="form-control" value="{{ $item->nama_barang }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_modal_{{ $item->id_barang }}" class="form-label">Harga Modal</label>
                                                    <input type="number" name="harga_modal" id="harga_modal_{{ $item->id_barang }}" class="form-control" value="{{ $item->harga_modal }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_jual_{{ $item->id_barang }}" class="form-label">Harga Jual</label>
                                                    <input type="number" name="harga_jual" id="harga_jual_{{ $item->id_barang }}" class="form-control" value="{{ $item->harga_jual }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok_{{ $item->id_barang }}" class="form-label">Stok</label>
                                                    <input type="number" name="stok" id="stok_{{ $item->id_barang }}" class="form-control" value="{{ $item->stok }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
