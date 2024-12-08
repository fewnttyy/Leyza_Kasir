<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kasir Toko</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f8fc;
            font-family: Arial, sans-serif;
        }
        .login-container {
            display: flex;
            min-height: 100vh;
        }
        .image-section {
            background-color: #cce7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        .image-section img {
            max-width: 80%;
        }
        .form-section {
            background-color: #ffffff;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
        .form-container .btn {
            border-radius: 20px;
        }
        .form-container .text-muted {
            font-size: 14px;
        }
        .form-container .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }
        .form-container .divider::before,
        .form-container .divider::after {
            content: '';
            position: absolute;
            width: 40%;
            height: 1px;
            background-color: #ccc;
            top: 50%;
        }
        .form-container .divider::before {
            left: 0;
        }
        .form-container .divider::after {
            right: 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Bagian Kiri -->
        <div class="image-section">
            <img src="{{ asset('gambar') }}/balon2.png" alt="Balloon Image">
        </div>

        <!-- Bagian Kanan -->
        <div class="form-section">
            <div class="form-container">
                <h4 class="text-center mb-4">Login</h4>
                
                <!-- Notifikasi -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Password" required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                </form>

                <!-- Daftar dan Reset Password -->
                <div class="divider">Belum terdaftar?</div>
                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 mb-2">Daftar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
