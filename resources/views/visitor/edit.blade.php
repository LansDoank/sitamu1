<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form - Edit Data Tamu</title>
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
                        <a class="text-decoration-none" href="/admin/visitor">
                            <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Edit Data Tamu</h1>
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
                <form action="/admin/visitor/update" method="POST" novalidate="false" enctype="multipart/form-data"
                    class="shadow mx-auto my-10 max-w-4xl p-8 bg-white border border-gray-200 rounded-lg">
                    @csrf
                    <div class="form-header">
                        <div class="flex items-center md:my-3">
                            <img class="w-10 me-2" src="/img/logo.png" alt="">
                            <h5 class="text-klipaa font-semibold text-2xl mb-0">TamuDesa</h5>
                        </div>
                        <p class="text-gray-700 font-medium text-sm my-2 md:my-0 md:text-base">Silakan isi data buku
                            tamu dengan benar.</p>
                    </div>
                    <div class="form-body">
                        <input type="hidden" name="province_code" value="{{ $oldVisit->province_code }}">
                        <input type="hidden" name="district_code" value="{{ $oldVisit->district_code }}">
                        <input type="hidden" name="sub_district_code" value="{{ $oldVisit->subdistrict_code }}">
                        <input type="hidden" name="village_code" value="{{ $oldVisit->village_code }}">
                        <input type="hidden" name="id" value="{{ $oldVisit->id }}">
                        <input type="hidden" name="oldPhoto" value="{{ $oldVisit->visitor_photo }}">
                        <input type="hidden" name="old_province" value="{{ $oldVisit->province_code }}">
                        <input type="hidden" name="old_district" value="{{ $oldVisit->district_code }}">
                        <input type="hidden" name="old_sub_district" value="{{ $oldVisit->subdistrict_code }}">
                        <input type="hidden" name="old_village" value="{{ $oldVisit->village_code }}">
                        <input type="hidden" id="old_institution" name="old_institution"
                            value="{{ $oldVisit->institution }}">
                        <input type="hidden" id="old_objective" name="old_objective"
                            value="{{ $oldVisit->objective }}">
                        <input type="hidden" id="old_ini" name="old_ini" value="{{ $oldVisit->i_n_i }}">
                        @if ($errors->any())
                            <div
                                class="bg-red-100 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                                Mohon isi semua form data!</div>
                        @endif
                        @if (session('visitor_success'))
                            <div
                                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                                {{ session('visitor_success') }}</div>
                        @endif
                        <ul class="md:my-5">
                            <li class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 md:my-3">
                                <div class="flex flex-col items-start w-full md:w-1/2">
                                    <label for="fullname" class="mb-2">Nama Lengkap</label>
                                    <input type="text" name="fullname" id="fullname"
                                        class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                                        placeholder="Masukkan nama anda" value="{{ $oldVisit->fullname }}">
                                </div>
                                <div class="flex flex-col items-start md:ps-5 w-full md:w-1/2">
                                    <label for="institution" class="mb-2">Instansi</label>
                                    <select
                                        class="instance form-input text-gray-600 border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                        name="institution" id="institution" required>
                                        <option disabled>Pilih Instansi</option>
                                        <option value="Lainnya" @selected('Lainnya' != $oldVisit->institution)>Lainnya</option>
                                        <option value="Supra Desa" @selected('Supra Desa' == $oldVisit->institution)>Supra desa</option>
                                        <option value="APH" @selected('APH' == $oldVisit->institution)>APH</option>
                                        <option value="Warga" @selected('Warga' == $oldVisit->institution)>Warga</option>
                                        <option value="Media" @selected('Media' == $oldVisit->institution)>Media</option>
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <textarea class="hidden w-full rounded-lg border border-gray-200 px-3 py-2" id="institution-textarea"
                                    placeholder="Sebutkan Instansi Anda"></textarea>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="telephone" class="mb-2">No. Telepon</label>
                                    <input type="text" name="telephone" id="telephone"
                                        class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                                        placeholder="Masukkan telepon anda" value="{{ $oldVisit->telephone }}">
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="province" class="mb-2">Provinsi</label>
                                    <select
                                        class="form-input text-gray-600 border rounded-lg border-gray-200 px-2 h-10 w-full"
                                        name="province" id="province" required>
                                        <option disabled selected
                                            {{ $oldVisit->province_code == $oldVisit->province->code ? 'selected' : '' }}>
                                            {{ $oldVisit->province->name }}</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}">
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="district" class="mb-2">Kabupaten</label>
                                    <select
                                        class="form-input text-gray-600 border rounded-lg border-gray-200 px-2 h-10 w-full"
                                        name="district" id="district" required>
                                        <option disabled selected
                                            {{ $oldVisit->district_code == $oldVisit->district->code ? 'selected' : '' }}>
                                            {{ $oldVisit->district->name }}</option>
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="sub_district" class="mb-2">Kecamatan</label>
                                    <select
                                        class="form-input text-gray-600 border rounded-lg border-gray-200 px-2 h-10 w-full"
                                        name="sub_district" id="sub_district" required>
                                        <option disabled selected
                                            {{ $oldVisit->sub_district_code == $oldVisit->subdistrict->code ? 'selected' : '' }}>
                                            {{ $oldVisit->subdistrict->name }}</option>
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="village" class="mb-2">Desa</label>
                                    <select
                                        class="form-input text-gray-600 border rounded-lg border-gray-200 px-2 h-10 w-full"
                                        name="village" id="village" required>
                                        <option disabled selected
                                            {{ $oldVisit->village_code == $oldVisit->village->code ? 'selected' : '' }}>
                                            {{ $oldVisit->village->name }}</option>
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-wrap md:flex-nowrap w-full gap-3 md:gap-0">
                                    <div class="flex flex-col items-start w-full md:w-1/2">
                                        <label for="check_in" class="mb-2">Tanggal Datang</label>
                                        <input type="datetime-local" name="check_in" id="check_in"
                                            class="form-input text-gray-600 rounded-lg border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                            value="{{ $oldVisit->check_in }}" required>
                                    </div>
                                    <div class="flex flex-col items-start w-full md:w-1/2">
                                        <label for="check_out" class="mb-2">Tanggal Pulang</label>
                                        <input type="datetime-local" name="check_out" id="check_out"
                                            class="form-input text-gray-600 rounded-lg border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                            value="{{ $oldVisit->check_out }}" required>
                                    </div>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="objective" class="mb-2">Tujuan</label>
                                    <select
                                        class="form-input text-gray-600 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                        name="objective" id="objective" required>
                                        <option disabled>Pilih Tujuan Anda</option>
                                        <option value="Lainnya" @selected('Lainnya' != $oldVisit->objective)>Lainnya</option>
                                        <option value="Koordinasi" @selected('Koordinasi' == $oldVisit->objective)>Koordinasi</option>
                                        <option value="Cari Informasi" @selected('Cari Informasi' == $oldVisit->objective)>Cari Informasi
                                        </option>
                                        <option value="Pembinaan" @selected('Pembinaan' == $oldVisit->objective)>Pembinaan</option>
                                        <option value="Studi Banding" @selected('Studi Banding' == $oldVisit->objective)>Studi Banding
                                        </option>
                                    </select>
                                </div>
                            </li>
                            <li class="md:my-3">
                                <textarea class="hidden w-full border rounded-lg border-gray-200 px-3 py-2" id="objective_textarea"
                                    placeholder="Sebutkan Tujuan Anda"></textarea>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label class="mb-2">Lokasi Tujuan</label>
                                    <input type="text" disabled value="{{ $oldVisit->visitType->name }}"
                                        class="form-input border border-gray-200 rounded w-full h-10 px-3">
                                </div>
                            </li>
                            <li class="md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="i_n_i" class="mb-2">Keterangan</label>
                                    <textarea class="form-input rounded text-gray-600 border border-gray-200 px-2 h-10 w-full py-2 min-h-[150px]"
                                        name="i_n_i" id="i_n_i" placeholder="Masukan Keterangan Disini"></textarea>
                                </div>
                            </li>
                            <li class="md:my-3 ">
                                <div class="flex flex-col items-start w-full">
                                    <label for="visitor_photo" id="photo" class="mb-2 w-full">Foto
                                        <div
                                            class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                            <img class="max-w-[300px]"
                                                src="{{ asset("storage/$oldVisit->visitor_photo") }}" alt="">
                                        </div>
                                    </label>
                                    <input class="hidden" type="file" name="visitor_photo" id="visitor_photo">
                                </div>
                            </li>
                            <li class="md:my-3">
                                <button class="w-full bg-klipaa rounded text-white font-normal h-12"
                                    type="submit">Simpan</button>
                            </li>
                        </ul>
                    </div>
                </form>
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
            const photoInput = document.getElementById('visitor_photo');

            photoInput.addEventListener('change', () => {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        inputPhoto.innerHTML = `
                            Foto
                            <div class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                <img class="w-full h-full max-w-[250px] object-cover" src="${e.target.result}" alt="">
                            </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        const institutionInput = document.getElementById("institution");
        const institutionTextArea = document.getElementById("institution-textarea");
        const oldInstitution = document.getElementById("old_institution");

        if (institutionInput.value == 'Lainnya') {
            institutionInput.removeAttribute("name");
            institutionTextArea.setAttribute("name", "institution");
            institutionTextArea.classList.remove("hidden");
            institutionTextArea.value = oldInstitution.value;
        }
        document.addEventListener('DOMContentLoaded', function() {})

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
        const oldObjective = document.getElementById("old_objective");

        document.addEventListener('DOMContentLoaded', function() {
            if (objective.value == 'Lainnya') {
                objective.removeAttribute("name");
                objectiveArea.setAttribute("name", "objective");
                objectiveArea.classList.remove("hidden");
                objectiveArea.value = oldObjective.value;
            }
        })

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

        const iniInput = document.getElementById('i_n_i');
        const oldIni = document.getElementById('old_ini');

        document.addEventListener('DOMContentLoaded', function() {
            iniInput.value = oldIni.value;
        })
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
                            districtSelect.innerHTML =
                                '<option disabled selected>Pilih Kabupaten</option>';
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
                            subDistrictSelect.innerHTML =
                                '<option selected disabled>Pilih Kecamatan</option>';
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
                            villageSelect.innerHTML =
                                '<option selected disabled>Pilih Desa</option>';
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
