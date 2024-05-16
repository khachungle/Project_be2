<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foody - Admin</title>

    {{-- icon Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom fonts for this template -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    @yield('css')
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            border: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 25px;
        }

        button:hover {
            background-color: #45a049;
        }

        .danhSach {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn_add_product a {
            color: white;
            text-decoration: none;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 70px;
        }

        table thead th {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        table tbody th,
        table tbody td {
            border-left: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        table tbody th:last-child,
        table tbody td:last-child {
            border-right: 1px solid #000;
        }

        table tbody tr th a {
            text-decoration: none;
            color: black;
        }

        .link {
            text-align: center;
            position: absolute;
            left: 45%;
        }

        h3 {
            text-align: center;
            color: red;
        }
    </style>

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
                <a class="nav-link" href="layout_manage_product">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lí sản phẩm</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Chức năng 2 -->
            <li class="nav-item active">
                <a class="nav-link" href="layout_manage_category">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lí danh mục</span></a>
            </li>

            <!-- Divider -->
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
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                {{-- Code riêng ở đây --}}
                @yield('content')
                <h5 class="danhSach">Danh sách sản phẩm hiện có</h5>
                <button class="btn_add_product"><a href="layout_add_product">Thêm Sản Phẩm</a></button>
                <main class="login-form">
                    <div class="container">

                        <div class="row justify-content-center">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh mục</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Ảnh</th>
                                        <th>Mô tả</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach ($products as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->LoaiDanhMuc }}</th>
                                        <th>{{ $item->TenSp }}</th>
                                        <th>{{ $item->Gia }}</th>
                                        <th>{{ $item->AnhMoTa }}</th>
                                        <th>{{ $item->MoTa }}</th>
                                        <td><a class="btn btn-success"
                                                href="{{ route('products.show', ['product' => $item->id, 'pageIndex' => $pageIndex]) }}"><i
                                                    class="fa-regular fa-eye"></i></a></td>
                                        <td><a class="btn btn-danger"
                                                href="{{ route('products.edit', ['product' => $item->id, 'pageIndex' => $pageIndex]) }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle='modal'
                                                data-bs-target='#A{{ $item->id }}'><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                        <div class='modal fade' id='A{{ $item->id }}' tabindex='-1'
                                            aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Xác nhận
                                                            xóa</h1>
                                                        <button type='button' class='btn-close'
                                                            data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        Bạn có muốn xóa sản phẩm có id: {{ $item->id }}
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary'
                                                            data-bs-dismiss='modal'>Trở lại</button>
                                                        <form
                                                            action="{{ route('products.destroy', ['product' => $item->id, 'pageIndex' => $pageIndex]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class='btn btn-primary'>Đồng
                                                                ý</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="text-align: center;" class="link"></div>
                    </div>
                </main>

            </div>
            <!-- End of Main Content -->
            @if ($numberOfPage > 1)
                <div class="d-flex justify-content-center align-items-center my-2">
                    <a class="btn btn-success"
                        href="{{ route('products.index', ['pageIndex' => $pageIndex - 1]) }}">Trước</a>
                    @for ($i = 1; $i <= $numberOfPage; $i++)
                        @if ($pageIndex == $i)
                            <a class="btn btn-primary ms-2"
                                href="{{ route('products.index', ['pageIndex' => $i]) }}">{{ $i }}</a>
                        @else
                            @if ($i == 1 || $i == $numberOfPage || ($i <= $pageIndex + 4 && $i >= $pageIndex - 4))
                                <a class="btn btn-success ms-2"
                                    href="{{ route('products.index', ['pageIndex' => $i]) }}">{{ $i }}</a>
                            @elseif($i == $pageIndex - 5 || $i == $pageIndex + 5)
                                <a class="btn btn-success ms-2"
                                    href="{{ route('products.index', ['pageIndex' => $i]) }}">...</a>
                            @endif
                        @endif
                    @endfor
                    <a class="btn btn-success ms-2"
                        href="{{ route('products.index', ['pageIndex' => $pageIndex + 1]) }}">Sau</a>
                </div>
            @endif

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{-- Custom JavaScript --}}
    @yield('js')
</body>

</html>
