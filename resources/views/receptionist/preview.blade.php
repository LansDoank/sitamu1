<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TamuDesa - Pratinjau Resepsionis</title>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <a class="text-decoration-none" href="/admin/receptionist">
                            <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Pratinjau Data Resepsionis</h1>
                        </a>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $username }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ $is_admin ? '/img/profile.png' : asset("storage/$user->photo") }}">
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
                <!-- /.container-fluid -->
                <div class="p-6 sm:p-8 bg-white max-w-5xl mx-auto my-10">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Pratinjau Akun Resepsionis
                    </h1>
                    <div class="text-red-500 text-md">{{ session('login') }}</div>
                    <form class="space-y-4 md:space-y-6">
                        <div>
                            <label for="name"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John Doe" value="{{ $users->name }}" disabled>
                        </div>
                        <div>
                            <label for="username"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john123" value="{{ $users->username }}" disabled>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="province"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <input type="text" name="province" id="province"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john123" value="{{ $users->province->name }}" disabled>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="district"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kabupaten</label>
                            <input type="text" name="district" id="district"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john123" value="{{ $users->district->name }}" disabled>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="sub_district"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <input type="text" name="sub_district" id="sub_district"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john123" value="{{ $users->sub_district->name }}" disabled>
                        </div>
                        <div class="flex flex-col items-start">
                            <label for="village"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Desa</label>
                            <input type="text" name="village" id="village"
                                class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john123" value="{{ $users->address->name }}" disabled>
                        </div>
                        <div class="flex flex-col items-start w-full">
                            <label for="visitor_photo" id="photo" class="mb-2 w-full">Foto
                            </label>
                            <div class="w-full flex justify-center">
                                <img class="w-full h-full object-cover max-w-[300px]"
                                    src="{{ asset('storage/' . $users->photo) }}" alt="">
                            </div>
                        </div>
                    </form>
                </div>

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputPhoto = document.getElementById('photo');
            const photoInput = document.getElementById('visitor_photo');

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

        const institutionInput = document.getElementById("institution");
        const institutionTextArea = document.getElementById("institution-textarea");

        institutionInput.addEventListener("change", function() {
            if (institutionInput.value === "Lainnya") {
                institutionInput.removeAttribute("name");
                institutionTextArea.setAttribute("name", "institution");
                institutionTextArea.classList.remove("hidden");
            } else {
                institutionTextArea.removeAttribute("name");
                institutionTextArea.classList.add("hidden");
                institutionInput.setAttribute("name", "institution");
            }
        });

        const objective = document.getElementById("objective");
        const objectiveArea = document.getElementById("objective_textarea");

        objective.addEventListener("change", function() {
            if (objective.value === "Lainnya") {
                objective.removeAttribute("name");
                objectiveArea.setAttribute("name", "objective");
                objectiveArea.classList.remove("hidden");
            } else {
                objectiveArea.removeAttribute("name");
                objectiveArea.classList.add("hidden");
                objective.setAttribute("name", "objective");
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const districtSelect = document.getElementById('district');
            const subDistrictSelect = document.getElementById('sub_district');
            const villageSelect = document.getElementById('village');

            // Event listener untuk memilih provinsi
            provinceSelect.addEventListener('change', function() {
                const provinceCode = this.value;

                if (provinceCode) {
                    // Ambil kabupaten berdasarkan provinsi
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

            // Event listener untuk memilih kabupaten
            districtSelect.addEventListener('change', function() {
                const districtCode = this.value;

                if (districtCode) {
                    // Ambil kecamatan berdasarkan kabupaten
                    fetch(`/api/sub-districts/${districtCode}`)
                        .then(response => response.json())
                        .then(data => {
                            subDistrictSelect.innerHTML = '<option selected>Pilih Kecamatan</option>';
                            data.forEach(subDistrict => {
                                subDistrictSelect.innerHTML +=
                                    `<option value="${subDistrict.code}">${subDistrict.name}</option>`;
                            });
                        });
                }
            });

            // Event listener untuk memilih kecamatan
            subDistrictSelect.addEventListener('change', function() {
                const subDistrictCode = this.value;

                if (subDistrictCode) {
                    // Ambil desa berdasarkan kecamatan
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
