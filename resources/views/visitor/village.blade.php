<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Form - Desa</title>
    <link rel="icon" href="/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    </script>
    <style>
        .bg-daun {
        background-image: url(/img/bgnowb.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    </style>
</head>
<body>
    <div class="w-full flex items-center bg-daun">
        <div class="w-full flex items-center md:py-10">
            <form class="bg-white rounded md:rounded-lg p-5 md:h-max m-5 md:my-0 md:p-10 m-5 md:mx-auto w-[88%] md:w-[500px] shadow" action="/form/desa/data" method="POST">
                @csrf
                <div class="header">
                    <div class="logo flex items-center">
                        <img class="w-12" src="/img/logo.png" alt="">
                        <h5 class="text-2xl ms-2 text-klipaa font-bold">Sitamu</h5>
                    </div>
                    <p class="my-3 text-sm text-gray-700">Silahkan pilih alamat kantor desa</p>
                </div>
                <h2 class="text-lg md:text-xl mb-3">Pilih lokasi tujuan desa anda</h2>
                <div class="flex flex-col my-2">
                    <label class="mb-2" for="province">Provinsi</label>
                    <select class="border border-gray-500 p-3 rounded text-gray-700" name="province" id="province">
                        <option value="">Pilih Provinsi Tujuan</option>
                        @foreach ($provinces as $province)
                            <option value="{{$province->code}}">{{$province->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col my-2">
                    <label class="mb-2" for="district">Kabupaten</label>
                    <select class="border border-gray-500 p-3 rounded text-gray-700" name="district" id="district">
                        <option value="">Pilih Kabupaten Tujuan</option>
                    </select>
                </div>
                <div class="flex flex-col my-2">
                    <label class="mb-2" for="sub_district">Kecamatan</label>
                    <select class="border border-gray-500 p-3 rounded text-gray-700" name="sub_district" id="sub_district">
                        <option value="">Pilih Kecamatan Tujuan</option>
                    </select>
                </div>
                <div class="flex flex-col my-2">
                    <label class="mb-2" for="village">Desa</label>
                    <select class="border border-gray-500 p-3 rounded text-gray-700" name="village" id="village">
                        <option value="">Pilih Desa Tujuan</option>
                    </select>
                </div>
                <div class="mt-5">
                    <button class="w-full bg-klipaa py-3 rounded-lg text-white" type="submit">Pilih</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const districtSelect = document.getElementById('district');
            const subDistrictSelect = document.getElementById('sub_district');
            const villageSelect = document.getElementById('village');

            provinceSelect.addEventListener('change', function() {
                const provinceCode = this.value;
                console.log(provinceCode);

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