<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!--Style CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
        <!--Material Icons Cdn-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet">
    </head>
    <body>
        <div class="side-menu">
            <div class="name-box">
                <div class="name">
                    <h2>Kasir Toko</h2>
                </div>
            </div>
            <ul>
                <li><a href="/dashboard"><span class="material-symbols-sharp">home</span>&nbsp;&nbsp;Home</a></li>
                <li>
                    <a href="{{ route('barang.index') }}">
                        <span class="material-symbols-sharp">category</span>
                        &nbsp;&nbsp;Barang
                    </a>
                </li>
                <li><a href="{{ route('penjualan.create') }}"><span class="material-symbols-sharp">payments</span>&nbsp;&nbsp;Transaksi</a></li>
                <li><a href="{{ route('transaksi.index') }}"><span class="material-symbols-sharp">inventory</span>&nbsp;&nbsp;Laporan Penjualan</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"><span class="material-symbols-sharp">logout</span>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="header">
                <div class="nav">
                    <div class="text">
                        <h2>Selamat datang, {{ auth()->user()->nama_pengguna }}!</h2>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="content-2">
                    <div class="recent-content">
                        @yield('recent-content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>