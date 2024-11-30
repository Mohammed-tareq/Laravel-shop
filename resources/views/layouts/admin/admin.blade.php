<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Admin Dashbord</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('https://fonts.bunny.net') }}">
    <link href="{{ asset('https://fonts.bunny.net/css?family=Nunito') }}" rel="stylesheet">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    @stack('css')

    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">


</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>


            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('assets/admin/img/avatar5.png') }}" class='img-circle elevation-2' width="40" height="40" alt="">
                        <span>Welcome Mr.{{ Auth::guard('admin')->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong>{{ Auth::guard('admin')->user()->name }}</strong></h4>
                        <div class="mb-3">{{ Auth::guard('admin')->user()->email }}</div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('adminlogout') }}">
                                {{ __('Logout') }}
                            </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
            @include('layouts.admin.sidebar')
        <!-- Content Wrapper. Contains page content -->


        @yield('content')


        <!-- /.content-wrapper -->
        <footer class="main-footer text-center mx-2" >

            <strong>Copyright &copy; 2024 AmazingShop All rights reserved.
        </footer>

    </div>
        <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 4 -->
		<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        @stack('js')

        <!-- AdminLTE App -->
		<script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
		<script src="{{ asset('assets/admin/js/demo.js') }}"></script>


</body>



</html>

