<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f8fc;
        }
        .form-container {
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .text {
            color: #003366;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .image {
            max-width: 100%;
        }
        #span-email{
            width: 150px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row w-100">
            <!-- side Kiri -->
            <div class="col-md-6 d-flex flex-column justify-content-center text-center">
                <h1 class="text">Aplikasi kasir toko dengan fitur antarmuka yang mudah digunakan. Daftar sekarang untuk pengalaman baru dalam mengelola bisnis Anda!</h1>
                <img src="{{ asset('gambar') }}/regist.jpg" alt="Hero Image" class="image">
            </div>
            <!-- side Kanan -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="form-container">
                    <h4 class="mb-3">Daftar Akun</h4>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id="nama_pengguna" name="nama_pengguna" value="{{ old('nama_pengguna') }}">
                            @error('nama_pengguna')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_toko" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" name="nama_toko" value="{{ old('nama_toko') }}">
                            @error('nama_toko')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="span-email">@gmail</span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                <span class="input-group-text">
                                    <i class="bi bi-eye-slash"></i>
                                </span>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Sudah punya akun? <a href="/login">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
