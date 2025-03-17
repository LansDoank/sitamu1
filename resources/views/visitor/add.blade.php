<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>

                <!-- Begin Page Content -->
                <!-- /.container-fluid -->
                <form action="/admin/visitor/create" method="POST" enctype="multipart/form-data"
                    class="shadow-none mx-auto my-10 max-w-4xl p-7 bg-white  rounded-xl">
                    @csrf
                    <input type="hidden" name="province_code" value="{{ $province_code }}">
                    <input type="hidden" name="district_code" value="{{ $district_code }}">
                    <input type="hidden" name="sub_district_code" value="{{ $sub_district_code }}">
                    <input type="hidden" name="village_code" value="{{ $village_code }}">
                    <input type="hidden" name="visit_type" value="{{ $visit_type }}">
                    <div class="form-header">
                        <div class="flex items-center md:my-3">
                            <img class="w-10 me-2" src="/img/logo.png" alt="">
                            <h5 class="text-klipaa font-semibold text-2xl mb-0">TamuDesa</h5>
                        </div>
                        <p class="text-gray-700 font-medium text-sm my-2 md:my-0 md:text-base">Silahkan isi data buku
                            tamu dengan benar.</p>
                    </div>
                    @if ($errors->any())
                        <div
                            class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                            Mohon isi semua form!</div>
                    @endif
                    @if (session('visitor_success'))
                        <div
                            class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                            {{session('visitor_success')}}</div>
                    @endif
                    <div class="form-body">
                        <ul class="md:my-5 space-y-5">
                            <li class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 md:my-3">
                                <div class="flex flex-col items-start w-full md:w-1/2">
                                    <label for="fullname" class="mb-2 text-sm text-gray-900 dark:text-white">Nama Lengkap</label>
                                    <input type="text" name="fullname" id="fullname"
                                        class="form-input border text-gray-700 border-gray-200 rounded-xl text-sm w-full h-10 px-3 bg-white"
                                        required placeholder="Masukkan nama lengkap disini">
                                </div>
                                <div class="flex md:ps-3 flex-col items-start w-full md:w-1/2">
                                    <label for="institution" class="mb-2 text-sm text-gray-900 dark:text-white">Instansi</label>
                                    <select
                                        class="instance form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full md:w-1/2 text-sm bg-white"
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
                            <li class="my-2 md:my-3">
                                <textarea class="hidden w-full border border-gray-200 px-3 py-2" id="institution-textarea"
                                    placeholder="Sebutkan Instansi Anda"></textarea>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="telephone" class="mb-2 text-sm text-gray-900 dark:text-white">Nomor Telepon</label>
                                    <input type="text" name="telephone" id="telephone"
                                        class="form-input border text-gray-700 border-gray-200 rounded-xl text-sm w-full h-10 px-3 bg-white"
                                        required placeholder="Masukkan nomor telepon disini">
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="province" class="mb-2 text-sm text-gray-900 dark:text-white">Provinsi</label>
                                    <select class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white "
                                        name="province" id="province">
                                        <option disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="district" class="mb-2 text-sm text-gray-900 dark:text-white">Kabupaten</label>
                                    <select class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white "
                                        name="district" id="district">
                                        <option disabled selected>Pilih Kabupaten</option>
                                    </select>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="sub_district" class="mb-2 text-sm text-gray-900 dark:text-white">Kecamatan</label>
                                    <select class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white "
                                        name="sub_district" id="sub_district">
                                        <option disabled selected>Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="village" class="mb-2 text-sm text-gray-900 dark:text-white">Desa</label>
                                    <select class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white capitalize"
                                        name="village" id="village">
                                        <option disabled selected class="capitalize">Pilih Desa</option>
                                    </select>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-wrap md:flex-nowrap w-full gap-3 md:gap-0">
                                    <div class="flex flex-col items-start w-full md:w-1/2">
                                        <label for="check_in" class="mb-2 text-sm text-gray-900 dark:text-white">Tanggal Datang</label>
                                        <input type="datetime-local" name="check_in" id="check_in"
                                            class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white   md:`w-1/2">
                                    </div>
                                    <div class="flex flex-col items-start w-full md:w-1/2 md:ps-3">
                                        <label for="check_out" class="mb-2 text-sm text-gray-900 dark:text-white">Tanggal Pulang</label>
                                        <input type="datetime-local" name="check_out" id="check_out"
                                            class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white   md:`w-1/2">
                                    </div>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="objective" class="mb-2 text-sm text-gray-900 dark:text-white">Tujuan</label>
                                    <select class="form-input text-gray-700 rounded-xl border border-gray-200 px-2 h-10 w-full text-sm bg-white "
                                        name="objective" id="objective">
                                        <option>Pilih Tujuan Anda</option>
                                        <option value="Koordinasi">Koordinasi</option>
                                        <option value="Cari Informasi">Cari Informasi</option>
                                        <option value="Pembinaan">Pembinaan</option>
                                        <option value="Studi Banding">Studi Banding</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <textarea class="hidden w-full border rounded-lg border-gray-200 px-3 py-2" id="objective_textarea"
                                    placeholder="Sebutkan Tujuan Anda"></textarea>
                            </li>
                            <li class="my-2 md:my-3">
                                <div class="flex flex-col items-start">
                                    <label for="i_n_i" class="mb-2 text-sm text-gray-900 dark:text-white">Keterangan (Opsional)</label>
                                    <textarea class="form-input rounded-xl bg-white text-sm text-gray-700 border border-gray-200 px-2 h-10 w-full py-2 min-h-[150px]"
                                        name="i_n_i" id="i_n_i" placeholder="Masukan Keterangan Disini"></textarea>
                                </div>
                            </li>
                            <li class="my-2 md:my-3 ">
                                <div class="flex flex-col items-start w-full">
                                    <label for="visitor_photo" id="photo" class="mb-2 text-sm text-gray-900 dark:text-white w-full">Foto Wajah
                                        <div
                                            class="w-full my-2 min-h-[150px] border border-gray-200 rounded-xl flex justify-center items-center">
                                            <img src="/img/input_photo.png" alt="">
                                        </div>
                                    </label>
                                    <input class="hidden" type="file" name="visitor_photo" id="visitor_photo">
                                </div>
                            </li>
                            <li class="my-2 md:my-3">
                                <button class="w-full bg-klipaa rounded-xl text-white font-normal h-12"
                                    type="submit">Kirim</button>
                            </li>
                        </ul>
                    </div>
                </form>
</x-dashboard>
