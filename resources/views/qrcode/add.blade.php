<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>

    <!-- Begin Page Content -->
    <!-- /.container-fluid -->
    <div class="p-6 sm:p-8 bg-white max-w-5xl mx-auto my-10 rounded-xl">
        <p class="text-sm text-gray-900">Silahkan isi dengan data yang benar untuk membuat Kode Qr</p>
        @if ($errors->any())
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                Mohon isi semua form!</div>
        @endif
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6" action="/admin/qr_code/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-start">
                <label for="province" class="mb-2 text-sm text-gray-900 dark:text-white">Provinsi</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full"
                    name="province" id="province">
                    <option disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="district" class="mb-2 text-sm text-gray-900 dark:text-white">Kabupaten</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full"
                    name="district" id="district">
                    <option disabled selected>Pilih Kabupaten</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district" class="mb-2 text-sm text-gray-900 dark:text-white">Kecamatan</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full"
                    name="sub_district" id="sub_district">
                    <option disabled selected>Pilih Kecamatan</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="mb-2 text-sm text-gray-900 dark:text-white">Desa</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full capitalize"
                    name="village" id="village">
                    <option selected class="capitalize">Pilih Desa</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-xl text-base px-5 py-2.5 text-center hover:brightness-90">Simpan
                Kode Qr</button>

        </form>
    </div>
</x-dashboard>
