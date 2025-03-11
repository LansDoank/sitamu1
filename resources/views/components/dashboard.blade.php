<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>
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
                width: 30% !important;
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
            <x-slot:user>{{ $user }}</x-slot:user>
            <x-slot:qrcode>{{ $isreceptionist }}</x-slot:qrcode>

        </x-sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="sidebar-unactive">

                {{ $slot }}
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer footer bg-white">
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
        function downloadExcel() {
            let table = document.getElementById("dataTable");
            let rows = table.querySelectorAll("tr");
            let csvContent = "";

            rows.forEach(row => {
                let cols = row.querySelectorAll("td, th");
                let rowData = [];
                cols.forEach(col => rowData.push(col.innerText));
                csvContent += rowData.join(",") + "\n";
            });

            let blob = new Blob([csvContent], {
                type: "text/csv"
            });
            let url = URL.createObjectURL(blob);
            let a = document.createElement("a");
            a.href = url;
            a.download = "tamudesa.csv";
            a.click();
        }
    </script>
    <script>
        const eye = document.querySelector('#eye');
        const password = document.querySelector('#password');

        const seePassword = () => {
            if (password.type == 'password') {
                password.setAttribute('type', 'text')
                eye.innerHTML = `
                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
`
            } else {
                password.setAttribute('type', 'password')
                eye.innerHTML =
                    `<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />`
            }
        }
    </script>
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
                                <img class="w-full h-full max-w-[250px]" src="${e.target.result}" alt="">
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

            const old_province = document.getElementById

            provinceSelect.addEventListener('change', function() {
                const provinceCode = this.value;

                if (provinceCode) {
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

            districtSelect.addEventListener('change', function() {
                const districtCode = this.value;

                if (districtCode) {
                    fetch(`/api/sub-districts/${districtCode}`)
                        .then(response => response.json())
                        .then(data => {
                            subDistrictSelect.innerHTML =
                                '<option disabled selected>Pilih Kecamatan</option>';
                            data.forEach(subDistrict => {
                                subDistrictSelect.innerHTML +=
                                    `<option value="${subDistrict.code}">${subDistrict.name}</option>`;
                            });
                        });
                }
            });

            subDistrictSelect.addEventListener('change', function() {
                const subDistrictCode = this.value;
                console.log(subDistrictCode)
                if (subDistrictCode) {
                    fetch(`/api/villages/${subDistrictCode}`)
                        .then(response => response.json())
                        .then(data => {
                            villageSelect.innerHTML = '<option disabled selected>Pilih Desa</option>';
                            data.forEach(village => {
                                villageSelect.innerHTML +=
                                    `<option value="${village.code}">${village.name}</option>`;
                            });
                        });
                }
            });
        });
    </script>
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
                                <img class="w-full h-full max-w-[250px]" src="${e.target.result}" alt="">
                            </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
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

            if (objective.value == 'Lainnya') {
                objective.removeAttribute("name");
                objectiveArea.setAttribute("name", "objective");
                objectiveArea.classList.remove("hidden");
                objectiveArea.value = oldObjective.value;
                console.log('cihuy', objective.value);
            }

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
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputPhoto = document.getElementById('photo');
            const photoInput = document.getElementById('image');

            photoInput.addEventListener('change', () => {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        inputPhoto.innerHTML = `
                            Foto
                            <div class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                <img class="w-full h-full max-w-[250px]" src="${e.target.result}" alt="">
                            </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('/chart/line')
            .then((res) => res.json())
            .then((data) => {
                const labels = data.map(item => {
                    const months = [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];
                    return months[item.month - 1]; // Ubah angka bulan menjadi nama bulan
                });

                const values = data.map(item => item.total);

                const ctx = document.getElementById('line-chart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Visitor per Bulan',
                            data: values,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }).catch(error => console.error("Error fetching data:", error));
    </script>
    <script>
        fetch('/chart/candle')
            .then((res) => res.json())
            .then((data) => {
                const labels = ['Supra Desa', 'APH', 'Warga', 'Media', 'Lainnya']
                new Chart('overview', {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Visitor per Instansi',
                            data: data,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }).catch(error => console.error("Error fetching data:", error));
    </script>
    <script>
        fetch('/chart/doughnut')
            .then((res) => res.json())
            .then((data) => {
                const labels = ['Studi Banding', 'Cari Informasi', 'Pembinaan', 'Koordinasi', 'Lainnya']
                new Chart('pie-chart', {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Visitor per Instansi',
                            data: data,
                            backgroundColor: [
                                'rgba(181, 78, 225, 1)',
                                'rgba(225, 80, 80, 1)',
                                'rgba(255, 162, 70, 1)',
                                'rgba(246, 194, 62, 1)',
                                'rgba(95, 230, 68, 1)',
                            ]
                        }]
                    }
                });
            }).catch(error => console.error("Error fetching data:", error));
    </script>
    <script>
        fetch('/chart/geographical')
            .then((res) => res.json())
            .then((data) => {

                google.charts.load('current', {
                    'packages': ['geochart'],
                    'mapsApiKey': 'YOUR_GOOGLE_MAPS_API_KEY' // Opsional
                });
                google.charts.setOnLoadCallback(() => drawRegionsMap(data));
            });

        function drawRegionsMap(apiData) {
            // Mapping kode provinsi dari angka ke ISO 3166-2:ID
            const provinceMapping = {
                "11": "ID-AC", // Aceh
                "12": "ID-SU", // Sumatera Utara
                "13": "ID-SB", // Sumatera Barat
                "14": "ID-RI", // Riau
                "15": "ID-JA", // Jambi
                "16": "ID-SS", // Sumatera Selatan
                "17": "ID-BE", // Bengkulu
                "18": "ID-LA", // Lampung
                "19": "ID-BB", // Kepulauan Bangka Belitung
                "21": "ID-KR", // Kepulauan Riau
                "31": "ID-JK", // DKI Jakarta
                "32": "ID-JB", // Jawa Barat
                "33": "ID-JT", // Jawa Tengah
                "34": "ID-YO", // DI Yogyakarta
                "35": "ID-JI", // Jawa Timur
                "36": "ID-BT", // Banten
                "51": "ID-BA", // Bali
                "52": "ID-NB", // Nusa Tenggara Barat
                "53": "ID-NT", // Nusa Tenggara Timur
                "61": "ID-KB", // Kalimantan Barat
                "62": "ID-KT", // Kalimantan Tengah
                "63": "ID-KS", // Kalimantan Selatan
                "64": "ID-KI", // Kalimantan Timur
                "65": "ID-KU", // Kalimantan Utara
                "71": "ID-SA", // Sulawesi Utara
                "72": "ID-ST", // Sulawesi Tengah
                "73": "ID-SN", // Sulawesi Selatan
                "74": "ID-SG", // Sulawesi Tenggara
                "75": "ID-GO", // Gorontalo
                "76": "ID-SR", // Sulawesi Barat
                "81": "ID-MA", // Maluku
                "82": "ID-MU", // Maluku Utara
                "91": "ID-PA", // Papua
                "92": "ID-PB" // Papua Barat
            };

            // Ubah data API ke format Google Charts
            const chartData = [
                ['Province', 'Visitors']
            ];
            apiData.forEach(item => {
                const provinceCode = provinceMapping[item.province_code]; // Konversi kode
                if (provinceCode) {
                    chartData.push([provinceCode, item.visitors]);
                }
            });


            var data = google.visualization.arrayToDataTable(chartData);

            var options = {
                region: 'ID', // Fokus ke Indonesia
                resolution: 'provinces',
                colorAxis: {
                    colors: ['#e0f3db', '#0868ac']
                }
            };

            var chart = new google.visualization.GeoChart(document.getElementById('geochart'));
            chart.draw(data, options);
        }
    </script>
    <script>
        async function fetchChartData() {
            try {
                const response = await fetch('/chart/time'); // Panggil API
                const data = await response.json();

                // Format data agar sesuai dengan chart
                const labels = data.map(item => item.hour + ":00"); // Konversi jam ke format "HH:00"
                const guestCounts = data.map(item => item.guests);

                // Render Chart
                const ctx = document.getElementById('waktu-chart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Guests by time',
                            data: guestCounts,
                            backgroundColor: 'rgba(44, 125, 157, 1)',
                        }]
                    }
                });
            } catch (error) {
                console.error("Error fetching chart data:", error);
            }
        }

        fetchChartData();
    </script>
    {{-- End Chart --}}
</body>

</html>
