<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <div>
            <a class="text-decoration-none" href="/admin/qr_code/edit/{{ $isreceptionist }}">
                <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Edit Kode Qr</h1>
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
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
    <div class="p-6 sm:p-8 bg-white max-w-5xl mx-auto my-10 ">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Edit Kode Qr
        </h1>
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6" action="/admin/qr_code/update" method="POST"
            enctype="multipart/form-data">
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
                <label for="province" class="mb-2">Provinsi</label>
                <select class="form-input bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
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
                <label for="district" class="mb-2">Kabupaten</label>
                <select class="form-input bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
                    name="district" id="district">
                    <option disabled selected
                        {{ $oldVisit->district_code == $oldVisit->district->code ? 'selected' : '' }}>
                        {{ $oldVisit->district->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district" class="mb-2">Kecamatan</label>
                <select class="form-input bg-gray-50 border border-gray-300 rounded-lg text-gray-700 px-2 h-10 w-full"
                    name="sub_district" id="sub_district">
                    <option disabled selected
                        {{ $oldVisit->subdistrict_code == $oldVisit->subdistrict->code ? 'selected' : '' }}>
                        {{ $oldVisit->subdistrict->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="mb-2">Desa</label>
                <select class="form-input bg-gray-50 border border-gray-300 rounded-lg text-gray-700 px-2 h-10 w-full"
                    name="village" id="village">
                    <option disabled selected>{{ $oldVisit->village->name }}</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-base px-5 py-2.5 text-center hover:brightness-90">Simpan</button>
        </form>
    </div>
</x-dashboard>
