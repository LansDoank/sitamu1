<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="md:p-10 lg:p-10 bg-daun">
        <form action="/form/create" method="POST" enctype="multipart/form-data"
            class="shadow bg-white lg:mx-auto w-full m-0 md:max-w-4xl p-6 md:p-8 border border-gray-200 md:rounded-lg">
            @csrf
            <div class="form-header">
                <div class="flex items-center md:my-3">
                    <img class="md:w-12 w-10 me-2" src="/img/logo.png" alt="">
                    <h5 class="text-klipaa font-semibold text-2xl  md:text-3xl">TamuDesa</h5>
                </div>
                <p class="text-gray-500 font-medium my-3 text-xs md:text-sm md:m-0">Silakan isi data buku tamu dengan
                    benar.</p>
            </div>
            <div class="form-body">
                <input type="hidden" name="province_code" value="{{ $visit->province_code }}">
                <input type="hidden" name="district_code" value="{{ $visit->district_code }}">
                <input type="hidden" name="sub_district_code" value="{{ $visit->sub_district_code }}">
                <input type="hidden" name="village_code" value="{{ $visit->village_code }}">
                <input type="hidden" name="visit_type" value="{{ $visit->id }}">
                @if ($errors->any())
                    <div class="bg-red-100 mt-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                        Mohon isi semua form data!</div>
                @endif
                <ul class="md:my-5">
                    <li class="flex gap-3 md:gap-x-5  md:my-3 flex-wrap md:flex-nowrap">
                        <div class="flex flex-col items-start w-full md:w-1/2">
                            <label for="fullname" class="mb-2 text-sm md:text-base">Nama Lengkap</label>
                            <input type="text" name="fullname" id="fullname"
                                class="form-input border text-gray-700 border-gray-200 rounded w-full h-10 px-3" required
                                placeholder="Masukkan nama anda" value="{{old('fullname')}}">
                        </div>
                        <div class="flex flex-col items-start w-full md:w-1/2">
                            <label for="institution" class="mb-2 text-sm md:text-base">Instansi</label>
                            <select
                                class="instance form-input text-gray-700 border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                name="institution" id="institution">
                                <option disabled selected>Pilih Instansi</option>
                                <option value="Supra Desa">Supra desa</option>
                                <option value="APH">APH</option>
                                <option value="Warga">Warga</option>
                                <option value="Media">Media</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </li>
                    <li class="md:my-3">
                        <textarea class="hidden w-full border rounded-lg border-gray-200 px-3 py-2" id="institution-textarea"
                            placeholder="Sebutkan Instansi Anda"></textarea>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="telephone" class="mb-2 text-sm md:text-base">No. Telepon</label>
                            <input type="text" name="telephone" id="telephone"
                                class="form-input border text-gray-700 border-gray-200 rounded w-full h-10 px-3" required
                                placeholder="Masukkan telepon anda" value="{{old('telephone')}}">
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="province" class="mb-2 text-sm md:text-base">Provinsi</label>
                            <select class="form-input text-gray-500 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                name="province" id="province">
                                <option disabled selected>Pilih Provinsi Anda</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}" {{old('province') == $province->code ? 'selected' : ''}}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="district" class="mb-2 text-sm md:text-base">Kabupaten</label>
                            <select class="form-input text-gray-500 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                name="district" id="district">
                                <option disabled selected>Pilih Kabupaten Anda</option>
                            </select>
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="sub_district" class="mb-2 text-sm md:text-base">Kecamatan</label>
                            <select class="form-input text-gray-500 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                name="sub_district" id="sub_district">
                                <option disabled selected>Pilih Kecamatan Anda</option>
                            </select>
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="village" class="mb-2 text-sm md:text-base">Desa</label>
                            <select class="form-input text-gray-500 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                name="village" id="village">
                                <option disabled selected>Pilih Desa Anda</option>
                            </select>
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex w-full gap-3 md:gap-10 flex-wrap md:flex-nowrap">
                            <div class="flex flex-col items-start w-full md:w-1/2">
                                <label for="check_in" class="mb-2 text-sm md:text-base">Waktu Datang</label>
                                <input type="datetime-local" name="check_in" id="check_in" value="{{old('check_in')}}"
                                    class="form-input w-full rounded-lg text-gray-500 border border-gray-200 px-2 h-10 w-1/2">
                            </div>
                            <div class="flex flex-col items-start w-full md:w-1/2">
                                <label for="check_out" class="mb-2 text-sm md:text-base">Waktu Pulang</label>
                                <input type="datetime-local" name="check_out" id="check_out" value="{{old('check_out')}}"
                                    class="form-input w-full rounded-lg text-gray-500 border border-gray-200 px-2 h-10 w-1/2">
                            </div>
                        </div>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="objective" class="mb-2 text-sm md:text-base">Tujuan</label>
                            <select class="form-input text-gray-500 rounded-lg border border-gray-200 px-2 h-10 w-full"
                                name="objective" id="objective">
                                <option selected disabled>Pilih Tujuan Anda</option>
                                <option value="Koordinasi">Koordinasi</option>
                                <option value="Cari Informasi">Cari Informasi</option>
                                <option value="Pembinaan">Pembinaan</option>
                                <option value="Studi Banding">Studi Banding</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </li>
                    <li class="my-3">
                        <textarea class="hidden w-full border border-gray-200 px-3 py-2" name="objective" id="objective_textarea"
                            placeholder="Sebutkan Tujuan Anda"></textarea>
                    </li>
                    <li class="my-3">
                        <div class="flex flex-col items-start">
                            <label for="i_n_i" class="mb-2 text-sm md:text-base">Keterangan <span class="text-gray-500">(Opsional)</span></label>
                            <textarea class="form-input rounded text-gray-500 border border-gray-200 px-2 h-10 w-full py-2 min-h-[150px]"
                                name="i_n_i" id="i_n_i" value="{{old('i_n_i')}}" placeholder="Masukan Keterangan Disini"></textarea>
                        </div>
                    </li>
                    <li class="my-3 ">
                        <div class="flex flex-col items-start w-full">
                            <label for="visitor_photo" id="photo" class="mb-2 w-full text-sm md:text-base">Foto Wajah
                                <div
                                    class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                    <img class="w-[150px] md:w-auto" src="/img/input_photo.png" alt="">
                                </div>
                            </label>
                            <input class="hidden" type="file" value="{{old('visitor_photo')}}" name="visitor_photo" id="visitor_photo">
                        </div>
                    </li>
                    <li class="my-3">
                        <button class="w-full bg-klipaa rounded text-white font-normal h-12"
                            type="submit">Kirim</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
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
                        Foto Wajah
                            <div class="w-full my-2 min-h-[150px] border border-gray-200 rounded-lg flex justify-center items-center">
                                <img class="w-full h-full max-w-[250px]" src="${e.target.result}" alt="">
                            </div>`;
                    };
                    reader.readAsDataURL(file);
                }
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
                            districtSelect.innerHTML = '<option disabled selected>Pilih Kabupaten Anda</option>';
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
                            subDistrictSelect.innerHTML = '<option disabled selected>Pilih Kecamatan Anda</option>';
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
                            villageSelect.innerHTML = '<option disabled selected>Pilih Desa Anda</option>';
                            data.forEach(village => {
                                villageSelect.innerHTML +=
                                    `<option value="${village.code}">${village.name}</option>`;
                            });
                        });
                }
            });
        });
    </script>
</x-layout>
