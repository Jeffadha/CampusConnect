<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('page/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('page/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('head')

    {{-- menghilangkan button file trix editor --}}
    <style>
        trix-toolbar .trix-button-group--file-tools {
            display: none;
        }

        trix-editor{
            background-color: #fff;
            height: 300px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Campus Connect</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (Auth()->user()->role == 'admin')
                
            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Manager</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Manager :</h6>
                        <a class="collapse-item" href="/admin/users">Users</a>
                        <a class="collapse-item" href="/admin/pengumuman">Pengumuman</a>
                        <a class="collapse-item" href="/admin/akademik">Jadwal Akademik</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            @endif

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengumuman.list') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Pengumuman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('akademik.list') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Jadwal Akademik</span></a>
            </li>

            @if (Auth()->user()->role == 'dosen')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tugas.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Tugas</span></a>
            </li>
            @endif

            @if (Auth()->user()->role == 'mahasiswa')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tugasMahasiswa') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Tugas</span></a>
            </li>
            @endif
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                    @yield('content');
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CampusConnect 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('page/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('page/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('page/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('page/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('page/js/demo/chart-pie-demo.js') }}"></script>
    
    {{-- non aktif file button trixeditor --}}
    <script>
        document.addEventListener('trix-file-accept',function(e){
            e.preventDefault();
        })
    </script>
    @yield('script')
</body>

</html>