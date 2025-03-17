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
        <h1 class="text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
            Kode Qr
        </h1>
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6" action="/admin/qr_code/update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $oldVisit->id }}">
            <input type="hidden" name="old_slug" value="{{ $oldVisit->slug }}">
            <input type="hidden" name="old_name" value="{{ $oldVisit->name }}">
            <input type="hidden" name="oldPhoto" value="{{ $oldVisit->photo }}">
            <input type="hidden" name="old_province" value="{{ $oldVisit->province_code }}">
            <input type="hidden" name="old_district" value="{{ $oldVisit->district_code }}">
            <input type="hidden" name="old_sub_district" value="{{ $oldVisit->sub_district_code }}">
            <input type="hidden" name="old_village" value="{{ $oldVisit->village_code }}">
            <div class="w-full flex items-center flex-col">
                <label class="text-lg" for="qr_code">Kode Qr</label>
                {{ QrCode::generate($oldVisit->qr_code) }}
                <a href="/generate/qrcode/{{ $oldVisit->id }}"
                    class="bg-blue-600 text-white rounded px-4 my-3 text-center flex items-center justify-center text-decoration-none py-2">Download
                    Kode Qr</a>
            </div>
            <div class="flex flex-col items-start">
                <label for="province" class="mb-2 text-sm text-gray-900 dark:text-white">Provinsi</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full"
                    name="province" id="province">
                    <option disabled selected
                        {{ $oldVisit->province_code == $oldVisit->province->code ? 'selected' : '' }}>
                        {{ $oldVisit->province->name }}</option>
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
                    <option disabled selected
                        {{ $oldVisit->district_code == $oldVisit->district->code ? 'selected' : '' }}>
                        {{ $oldVisit->district->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district" class="mb-2 text-sm text-gray-900 dark:text-white">Kecamatan</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full"
                    name="sub_district" id="sub_district">
                    <option disabled selected
                        {{ $oldVisit->subdistrict_code == $oldVisit->subdistrict->code ? 'selected' : '' }}>
                        {{ $oldVisit->subdistrict->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="mb-2 text-sm text-gray-900 dark:text-white">Desa</label>
                <select
                    class="form-input border border-gray-300 text-gray-700 rounded-xl bg-white text-sm px-2 h-10 w-full capitalize"
                    name="village" id="village">
                    <option disabled selected class="capitalize">{{ $oldVisit->village->name }}</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-xl text-base px-5 py-2.5 text-center hover:brightness-90">Perbarui
                Kode Qr</button>
        </form>
    </div>
</x-dashboard>
