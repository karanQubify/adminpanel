<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- Navbar -->
        @include('admin.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.includes.sidebar')
        <!-- Main sidebar end -->
        <!-- Content Wrapper. Contains page content -->
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- footer -->
        @include('admin.includes.footer')
        <!-- footer end -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


</body>

</html>
