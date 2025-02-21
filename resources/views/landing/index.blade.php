<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-secondary navbar-dark sticky-top">
            <div class="container">
                <a href="./" class="navbar-brand">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Buku Kita</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- SEARCH FORM -->
                    <form action="{{route('search')}}" method="get" class="input-group row">
                        <input type="text" name="key" class="form-control form-control-sm col-lg-8 ml-4" placeholder="Cari Nama Buku...." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-sm" type="button" id="button-addon2"><em class="fas fa-search"></em></button>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-danger navbar-badge">{{$cartCount}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @foreach ($cartData as $c)
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                        class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <p class="text-sm">{{$c->book_cart->nama_buku}}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">Lihat Semua</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <div class="media-body">
                                        <p>Untuk Menggunakan Fitur Keranjang Anda Harus Login Terlebih Dahulu</p>
                                        <div class="mt-3">
                                            <button class="btn btn-success btn-sm text-center">
                                                Klik Disini
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                        </div>
                    </li>
                    @endauth
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="/category" role="button">
                            Kategori
                        </a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="far fa-user"></i> {{Auth::user()->personal->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <a href="/update_profile" class="dropdown-item">
                            <i class="fas fa-user-edit mr-2"></i> Ubah Profile
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="/update_password" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Ubah Password
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="/orders" class="dropdown-item">
                            <i class="fas fa-square mr-2"></i> Pesanan
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="/logout" class="dropdown-item dropdown-footer"><i class="fas fa-power-off"></i> Logout</a>
                        </div>
                      </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/auth" role="button">
                            <i class="fas fa-sign-in-alt"></i> Masuk
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content -->
        @yield('content')
        <!-- / Content -->

        <!-- Main Footer -->
        <footer class="main-footer text-center bg-secondary">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>

</html>
