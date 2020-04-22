<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/custom-style.css">

  <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/custom-style.css">

  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
  <style>
    body, h1, h2, h3, h4, h5, h6 {
      font-family: 'Cairo', sans-serif !important;
      font-size: 17px;
    }
  </style>

  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('front.index') }}" class="nav-link">الذهاب للموقع</a>
      </li>
{{--      <li class="nav-item d-none d-sm-inline-block">--}}
{{--        <a href="#" class="nav-link">تماس</a>--}}
{{--      </li>--}}
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('admin.index') }}" class="nav-link">
                          <i class="nav-icon fa fa-dashboard"></i>
                          <p>
                              الرئيسية
                          </p>
                      </a>
                  </li>
              <li class="nav-item">
                  <a href="{{ route('front.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-eye"></i>
                      <p>
                          الذهاب للموقع
                      </p>
                  </a>
              </li>

              @if(auth()->guard('admin')->user()->can('read_admins'))
                <li class="nav-item">
                  <a href="{{ route('admin.admins.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-user-secret"></i>
                    <p>
                      المشرفين
                    </p>
                  </a>
                </li>
              @endif

          @if(auth()->guard('admin')->user()->can('read_categories'))
            <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="nav-icon fa fa-list-alt"></i>
                <p>
                  اقسام المقالات
                </p>
              </a>
            </li>
          @endif

          @if(auth()->guard('admin')->user()->can('read_blogs'))
            <li class="nav-item">
              <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>
                  المقالات
                </p>
              </a>
            </li>
          @endif
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  الاشتراكات
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-comment-o"></i>
                <p>
                  التعليقات
                </p>
              </a>
            </li>
            <li class="nav-header">الاضافات</li>
              @if(auth()->guard('admin')->user()->can('create_admins'))
                <li class="nav-item">
                  <a href="{{ route('admin.admins.create') }}" class="nav-link">
                    <i class="nav-icon fa fa-plus-circle"></i>
                    <p>
                      اضف مشرف
                    </p>
                  </a>
                </li>
              @endif

              @if(auth()->guard('admin')->user()->can('create_categories'))
                <li class="nav-item">
                  <a href="{{ route('admin.categories.create') }}" class="nav-link">
                    <i class="nav-icon fa fa-plus-circle"></i>
                    <p>
                      اضف قسم
                    </p>
                  </a>
                </li>
              @endif

          @if(auth()->guard('admin')->user()->can('create_blogs'))
            <li class="nav-item">
              <a href="{{ route('admin.blogs.create') }}" class="nav-link">
                <i class="nav-icon fa fa-plus-circle"></i>
                <p>
                  اضف مقالة
                </p>
              </a>
            </li>
          @endif

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
    </div>
    <!-- Default to the left -->
    <strong>حقوق &copy; 2020 <a href="http://www.abdelrahman-osama.epizy.com/" target="_blank">عبدالرحمن اسامة</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/admin') }}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{ asset('assets/admin') }}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('assets/admin') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="{{ asset('assets/admin') }}/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('assets/admin') }}/dist/js/pages/dashboard2.js"></script>

<script src="{{ asset('assets/admin') }}/dist/js/pages/dashboard2.js"></script>

@stack('js')
</body>
</html>
