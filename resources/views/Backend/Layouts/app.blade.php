<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ENV('APP_NAME') }} | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/Backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/Backend/plugins/fontawesome-free-6.5.1-web/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/Backend/dist/css/adminlte.min.css') }}">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('logOut')}}" class="nav-link text-danger">LogOut</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="javascript:void(0)" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/Backend/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/Backend/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/Backend/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-black shadow-lg">
            <!-- Brand Logo -->
            <a href="javascript:void(0)" class="brand-link">
                <img src="{{ asset('public/Backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{encryptor('decrypt',request()->session()->get('role'))}}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('public/uploads/users/'.request()->session()->get('image')) }}"
                            class="img-circle elevation-2" alt="img" width="50px" height="50px">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block">{{encryptor('decrypt', request()->session()->get('userName'))}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}"
                                class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{Route::is('user*')?'menu-open':''}}">
                            <a href="{{ route('user.index') }}" class="nav-link {{Route::is('user*')?'active':''}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.create') }}"
                                        class="nav-link {{Route::is('user.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Route::is('role*')?'menu-open':''}}">
                            <a href="{{ route('role.index') }}" class="nav-link {{Route::is('role*')?'active':''}}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Roles</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}"
                                        class="nav-link {{Route::is('role.index')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Role List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('role.create') }}"
                                        class="nav-link {{Route::is('role.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Role</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Route::is('brand*')?'menu-open':''}}">
                            <a href="{{ route('brand.index') }}" class="nav-link {{Route::is('brand*')?'active':''}}">
                                <i class="nav-icon fa-brands fa-bandcamp"></i>
                                <p>Brands</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('brand.index') }}"
                                        class="nav-link {{Route::is('brand.index')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('brand.create') }}"
                                        class="nav-link {{Route::is('brand.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Brand</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Route::is('category*')?'menu-open':''}}">
                            <a href="{{ route('category.index') }}" class="nav-link {{Route::is('category*')?'active':''}}">
                                <i class="nav-icon fa-solid fa-layer-group"></i>
                                <p>Categories</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}"
                                        class="nav-link {{Route::is('category.index')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}"
                                        class="nav-link {{Route::is('category.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Route::is('subcategory*')?'menu-open':''}}">
                            <a href="{{ route('subcategory.index') }}" class="nav-link {{Route::is('subcategory*')?'active':''}}">
                                <i class="nav-icon fa-solid fa-table-list"></i>
                                <p>Subcategories</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.index') }}"
                                        class="nav-link {{Route::is('subcategory.index')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subcategory List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.create') }}"
                                        class="nav-link {{Route::is('subcategory.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Subcategory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Route::is('product*')?'menu-open':''}}">
                            <a href="{{ route('product.index') }}" class="nav-link {{Route::is('product*')?'active':''}}">
                                <i class="nav-icon fa-solid fa-gift"></i>
                                <p>Products</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}"
                                        class="nav-link {{Route::is('product.index')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('product.create') }}"
                                        class="nav-link {{Route::is('product.create')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper shadow-lg">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="javascript:void(0)">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('public/Backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/Backend/dist/js/adminlte.js') }}"></script>
    {{-- TOASTER --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
    @stack('scripts')
</body>

</html>