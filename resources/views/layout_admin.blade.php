<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <title>Foody - Admin</title>

    {{-- icon Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom fonts for this template -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('css')


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="layout_admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Foody</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Chức năng 1 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lí sản phẩm</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 2 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lí danh mục</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 3 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.orders') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lí đơn hàng</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 4 -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin/manage_about_us_information">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Chỉnh sửa About Us</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 5 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.manage_voucher') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mã giảm giá</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 6 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('favicon.form') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Chỉnh sửa favicon</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Chức năng 7 -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('banner.form') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Chỉnh sửa banner</span></a>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Username</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" alt="ảnh">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <form method="get" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Đăng xuất</button>
                                    </form>

                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                {{-- Code riêng ở đây --}}
                @yield('content')


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{-- Custom JavaScript --}}
    @yield('js')
</body>

</html>
