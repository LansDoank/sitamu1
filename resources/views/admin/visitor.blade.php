<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        @if ($is_admin)
            <div>
                <a class="text-decoration-none" href="/admin/visitor">
                    <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Tamu</h1>
                </a>
            </div>
        @else
            <div>
                <h1 class="text-gray-600 text-xl md:text-2xl mb-0">Tamu</h1>
            </div>
        @endif

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
    <!-- End of Topar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-2 text-2xl  lg:text-3xl text-gray-800">Tabel Tamu</h1>
        @if (session('visitor_error'))
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                {{ session('visitor_error') }}</div>
        @endif
        @if (session('visitor_success'))
            <div
                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                {{ session('visitor_success') }}</div>
        @endif
        @if ($user->role_id == '1')
            <div class="flex mb-3 justify-between flex-wrap gap-3">
                <a href="/admin/visitor/add/{{ $code }}"
                    class="bg-klipaa w-full md:w-44 lg:w-48 font-medium text-base md:text-sm lg:text-base flex justify-center items-center text-white rounded px-3 h-12 text-decoration-none hover:brightness-90">+
                    Tambah Data Tamu</a>
                <div class="flex gap-3 flex-wrap md:w-[320px] lg:w-[400px] w-full">
                    <a href="/generate/visitor/{{ $code }}"
                        class="bg-blue-600 text-white rounded px-4 text-center flex text-decoration-none items-center w-full md:w-36 md:text-sm lg:text-base lg:w-48 justify-center font-medium h-12">Buat
                        Laporan</a>
                    <button onclick="downloadExcel()"
                        class="bg-red-600 text-white font-medium rounded px-2 md:w-40 md:text-sm lg:text-base lg:w-48 w-full h-12">Download
                        Excel</button>
                </div>
            </div>
        @else
            <div class="flex mb-3 justify-between w-full flex-wrap">
                <a href="/admin/visitor/add/{{ $user->village_code }}"
                    class="bg-klipaa font-medium text-md mb-3 md:mb-0 flex justify-center items-center text-white rounded px-3 h-12 w-full md:w-40 md:text-sm lg:w-48 text-decoration-none hover:brightness-90">+
                    Buat Data Tamu</a>
                <div class="flex gap-3 flex-wrap md:w-[320px] lg:w-[400px] w-full">
                    <a href="/generate/visitor/{{ $code }}"
                        class="bg-blue-600 text-white rounded px-4 text-center flex text-decoration-none items-center w-full md:w-40 md:text-sm lg:text-base lg:w-48 justify-center font-medium h-12">Buat
                        Laporan</a>
                    <button onclick="downloadExcel()"
                        class="bg-red-600 text-white font-medium rounded px-4 md:w-40 md:text-sm lg:text-base lg:w-48 w-full h-12">Download
                        Excel</button>
                </div>

            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-1">Foto</th>
                                <th class="col-1">Nama</th>
                                <th class="col-1">Instansi</th>
                                <th class="col-1">No. Telp</th>
                                <th class="col-1">Check-in</th>
                                <th class="col-1">Check-out</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td class="">
                                        <a href="/admin/visitor/preview/{{ $visitor->id }}">
                                            <img class="mx-auto"
                                                style="width: 50px; height: 50px; object-position: center; object-fit: cover;"
                                                src="{{ asset("storage/$visitor->visitor_photo") }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($visitor->fullname, 10) }}</td>
                                    <td>{{ $visitor->institution }}</td>
                                    <td>{{ Str::limit($visitor->telephone, 15) }}</td>
                                    <td>{{ $visitor->check_in }}</td>
                                    <td>{{ $visitor->check_out }}</td>
                                    <td class="flex">
                                        <a class="rounded text-white w-1/2 h-10 text-center flex items-center justify-center text-decoration-none "
                                            href="/admin/visitor/edit/{{ $visitor->id }}">
                                            <img class="w-5" src="/img/edit.png" alt="">
                                        </a>
                                        <a class="rounded text-white w-1/2 h-10 text-center justify-center flex items-center text-decoration-none "
                                            onclick="return confirm('Yakin?')"
                                            href="/admin/visitor/delete/{{ $visitor->id }}">
                                            <img class="w-5" src="/img/trashcan.png" alt="">
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
