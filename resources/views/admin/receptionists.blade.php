<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Resepsionis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" href="/img/logo.png">
    <style>
        .sidebar {
            width: 20% !important;
        }

        .sidebar-unactive {
            padding-left: 20%;
        }

        .footer {
            margin-left: 20%;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                width: 25% !important;
            }

            .sidebar-unactive {
                padding-left: 25%;
            }

            #pie-chart {
                width: 500px;
            }
        }

        @media screen and (max-width:576px) {

            .sidebar {
                width:30% !important;
            }

            .sidebar-unactive {
                padding-left: 30%;
            }

            .footer {
                margin-left: 0%;
            }

            .nav-link {
                width: 6rem !important;
            }

            #brand {
                display: none;
            }
        }
    </style>
</head>

<body id="page-top" class="w-full">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-sidebar>
            <x-slot:user>{{ $user->role_id }}</x-slot:user>
            <x-slot:qrcode>{{$isreceptionist}}</x-slot:qrcode>

        </x-sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="sidebar-unactive">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <h1 class="text-gray-600 text-xl md:text-2xl mb-0">Resepsionis</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $username }}</span>
                            <img class="img-profile rounded-circle" src="{{$is_admin ? "/img/profile.png" : asset("storage/$user->photo")}}">
                        </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="text-2xl md:text-3xl mb-2 text-gray-800">Tabel Resepsionis</h1>
                    @if (session('receptionist_error'))
                        <div
                            class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                            {{session('receptionist_error')}}</div>
                    @endif
                    @if (session('receptionist_success'))
                        <div
                            class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                            {{session('receptionist_success')}}</div>
                    @endif
                    <div class="flex mb-3 ">
                        <a href="/admin/receptionist/add"
                            class="bg-klipaa font-medium text-md flex justify-center items-center text-white rounded px-3 h-12 text-decoration-none hover:brightness-90">+
                            Buat Akun Resepsionis</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Resepsionis</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="col-2">Foto</th>
                                            <th class="col-2">Nama</th>
                                            <th class="col-2">Username</th>
                                            <th class="col-5">Desa</th>
                                            <th class="col-1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($receptionists as $receptionist)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td class="">
                                                    <a href="/admin/receptionist/preview/{{$receptionist->id}}">
                                                        <img class="mx-auto"
                                                        style="width: 50px; height: 50px; object-position: center; object-fit: cover;"
                                                        src="{{ asset('storage/' . $receptionist->photo) }}"
                                                        alt="">
                                                    </a>
                                                </td>
                                                <td>{{ $receptionist->name }}</td>
                                                <td>{{ $receptionist->username }}</td>
                                                <td>{{ Str::limit($receptionist->address->name, 20) }}</td>
                                                <td class="flex">
                                                    <a class="rounded text-white w-1/2 h-10 text-center flex items-center justify-center text-decoration-none "
                                                        href="/admin/receptionist/edit/{{ $receptionist->id }}">
                                                        <img class="w-5" src="/img/edit.png" alt="">
                                                    </a>
                                                    <a class="rounded text-white w-1/2 h-10 text-center justify-center flex items-center text-decoration-none "
                                                        onclick="return confirm('Yakin?')"
                                                        href="/admin/receptionist/delete/{{ $receptionist->id }}">
                                                        <img class="w-5" src="/img/trashcan.png" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TamuDesa 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="/logout">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}

    {{-- <div class="w-full h-screen bg-gray-100">
    </div> --}}

    <!-- Bootstrap core JavaScript-->
    <script>
        const toggleSidebar = document.getElementById('sidebarToggleTop');
        const sidebar = document.querySelector('.sidebar');
        const content = document.getElementById('content');

        document.addEventListener('DOMContentLoaded', function() {})


        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('hidden');
            content.classList.toggle('sidebar-unactive');
        });
    </script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

</body>

</html>
