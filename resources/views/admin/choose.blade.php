<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>
    <!-- Topbar -->
    {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <div>
            <h1 class="text-gray-600 text-xl md:text-2xl mb-0">Tamu</h1>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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

    </nav> --}}
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        @if (session('visitor_error'))
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                {{ session('visitor_error') }}</div>
        @endif
        @if (session('visitor_success'))
            <div
                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                {{ session('visitor_success') }}</div>
        @endif
        <div class="flex  my-3">
            <form class="w-full" action="" method="GET">
                <input class="w-full px-3 py-2 bg-white rounded-xl border" type="search" id="desa" name="desa"
                    id="desa" placeholder="Cari desa anda disini...">
                    <button class="hidden" type="submit">Cari</button>
            </form>
        </div>
        <div class="flex w-full mb-5 justify-between">
            <div class="flex flex-col md:flex-row w-full justify-between">
                <div class="w-full my-1 md:m-0 md:w-[23%]">
                    <select class="rounded-xl border bg-white py-2 px-3 w-full" id="province" name="province"
                        id="province">
                        <option value="" disabled selected>Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->code }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full my-1 md:m-0 md:w-[23%]">
                    <select class="rounded-xl border bg-white py-2 px-3 w-full" id="district" name="district"
                        id="district">
                        <option disabled selected>Pilih Kabupaten</option>
                    </select>
                </div>
                <div class="w-full my-1 md:m-0 md:w-[23%]">
                    <select class="rounded-xl border bg-white py-2 px-3 w-full" id="sub_district" name="sub_district"
                        id="sub_district">
                        <option disabled selected>Pilih Kecamatan</option>
                    </select>
                </div>
                <div class="w-full my-1 md:m-0 md:w-[23%]">
                    <select class="rounded-xl border bg-white py-2 px-3 w-full" id="village" name="village"
                        id="village">
                        <option disabled selected>Pilih Desa</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header border-none bg-white py-3">
                <h6 class="m-0 font-weight-bold text-klipaa">Daftar Desa Terdaftar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-2">Provinsi</th>
                                <th class="col-2">Kabupaten</th>
                                <th class="col-2">Kecamatan</th>
                                <th class="col-2">Nama Desa</th>
                                <th class="col-2">Jumlah Tamu</th>
                                <th class="col-1 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="visitor-table">
                            <?php $no = 1; ?>
                            @foreach ($villages as $village)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $village->province->name }}</td>
                                    <td>{{ $village->district->name }}</td>
                                    <td>{{ $village->subdistrict->name }}</td>
                                    <td>{{ Str::ucfirst($village->name) }}</td>
                                    <td>{{ $visitor->where('village_code', $village->village_code)->count() }}</td>
                                    <td>
                                        <a class="rounded bg-blue-600 text-white px-2 py-1 text-center flex items-center justify-center text-decoration-none "
                                            href="/admin/visitor/{{ $village->village_code }}">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</x-dashboard>
