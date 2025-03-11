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
            <a class="text-decoration-none" href="/admin/qr_code">
                <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Tambah Kode Qr</h1>
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
    <div class="p-6 sm:p-8 bg-white max-w-5xl mx-auto my-10">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Tambah Data Kode Qr
        </h1>
        @if ($errors->any())
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                Mohon isi semua form!</div>
        @endif
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6" action="/admin/qr_code/create" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-start">
                <label for="province" class="mb-2">Provinsi</label>
                <select class="form-input bg-gray-50 border border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
                    name="province" id="province">
                    <option disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="district" class="mb-2">Kabupaten</label>
                <select
                    class="form-input bg-gray-50 border rounded-lg border-gray-300 text-gray-700 rounded-lg px-2 h-10 w-full"
                    name="district" id="district">
                    <option disabled selected>Pilih Kabupaten</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district" class="mb-2">Kecamatan</label>
                <select class="form-input bg-gray-50 rounded-lg border border-gray-300 text-gray-700 px-2 h-10 w-full"
                    name="sub_district" id="sub_district">
                    <option disabled selected>Pilih Kecamatan</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="mb-2">Desa</label>
                <select class="form-input bg-gray-50 border rounded-lg border-gray-300 text-gray-700 px-2 h-10 w-full"
                    name="village" id="village">
                    <option selected>Pilih Desa</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-base px-5 py-2.5 text-center hover:brightness-90">Buat
                Kode Qr</button>

        </form>
    </div>
</x-dashboard>
