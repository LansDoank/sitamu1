<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sitamu - Qr Code</title>
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
        @media screen and (max-width:576px){
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
            <x-slot:user>{{$user->role_id}}</x-slot:user>
        </x-sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <a class="text-decoration-none" href="/admin/qr_code">
                            <h1 class="text-gray-600 text-2xl ">&laquo; Tambah Data Qr Code</h1>
                        </a>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
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



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $username }}</span>
                                <img class="img-profile rounded-circle" src="{{asset("storage/" . $photo)}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- /.container-fluid -->
                <div class="p-6 sm:p-8 bg-white max-w-5xl mx-auto my-10">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Tambah Data Kode Qr
                    </h1>
                    <div class="text-red-500 text-md">{{ session('login') }}</div>
                    <form class="space-y-4 md:space-y-6" action="/admin/qr_code/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col items-start">
                            <label for="province" class="mb-2">Provinsi</label>
                            <select
                                class="form-input bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
                                name="province" id="province">
                                <option selected>Pilih Provinsi Anda</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province->code}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="district" class="mb-2">Kabupaten</label>
                            <select
                                class="form-input bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
                                name="district" id="district">
                                <option selected>Pilih Kabupaten Anda</option>
                            </select>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="sub_district" class="mb-2">Kecamatan</label>
                            <select class="form-input bg-gray-50 border border-gray-300 text-gray-700 px-2 h-10 w-full"
                                name="sub_district" id="sub_district">
                                <option selected>Pilih Kecamatan Anda</option>
                            </select>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="village" class="mb-2">Desa</label>
                            <select class="form-input bg-gray-50 border border-gray-300 text-gray-700 px-2 h-10 w-full"
                                name="village" id="village">
                                <option selected>Pilih Desa Anda</option>
                                {{-- @foreach ($villages as $village)
                                <option value="{{$village->code}}">{{$village->name}}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-base px-5 py-2.5 text-center hover:brightness-90">Buat
                            Kode Qr</button>

                    </form>
                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sitamu 2025</span>
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
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}

    {{-- <div class="w-full h-screen bg-gray-100">
    </div> --}}

    <!-- Bootstrap core JavaScript-->
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputPhoto = document.getElementById('photo');
            const photoInput = document.getElementById('receptionist_photo');

            photoInput.addEventListener('change', () => {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        inputPhoto.innerHTML = `
                            Foto
                            <div class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                <img class="max-w-[400px] max-h-[200px] object-cover" src="${e.target.result}" alt="">
                            </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const provinceSelect = document.getElementById('province');
                const districtSelect = document.getElementById('district');
                const subDistrictSelect = document.getElementById('sub_district');
                const villageSelect = document.getElementById('village');
    
                provinceSelect.addEventListener('change', function() {
                    const provinceCode = this.value;
    
                    if (provinceCode) {
                        fetch(`/api/districts/${provinceCode}`)
                            .then(response => response.json())
                            .then(data => {
                                districtSelect.innerHTML = '<option selected>Pilih Kabupaten</option>';
                                data.forEach(district => {
                                    districtSelect.innerHTML +=
                                        `<option value="${district.code}">${district.name}</option>`;
                                });
                            });
                    }
                });
    
                districtSelect.addEventListener('change', function() {
                    const districtCode = this.value;
    
                    if (districtCode) {
                        fetch(`/api/sub-districts/${districtCode}`)
                            .then(response => response.json())
                            .then(data => {
                                subDistrictSelect.innerHTML =
                                    '<option selected>Pilih Kecamatan</option>';
                                data.forEach(subDistrict => {
                                    subDistrictSelect.innerHTML +=
                                        `<option value="${subDistrict.code}">${subDistrict.name}</option>`;
                                });
                            });
                    }
                });
    
                subDistrictSelect.addEventListener('change', function() {
                    const subDistrictCode = this.value;
    
                    if (subDistrictCode) {
                        fetch(`/api/villages/${subDistrictCode}`)
                            .then(response => response.json())
                            .then(data => {
                                villageSelect.innerHTML = '<option selected>Pilih Desa</option>';
                                data.forEach(village => {
                                    villageSelect.innerHTML +=
                                        `<option value="${village.code}">${village.name}</option>`;
                                });
                            });
                    }
                });
            });
        </script>
</body>

</html>
