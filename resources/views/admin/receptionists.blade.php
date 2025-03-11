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

        <div>
            <h1 class="text-gray-600 text-xl md:text-2xl mb-0">Resepsionis</h1>
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

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-2xl md:text-3xl mb-2 text-gray-800">Tabel Resepsionis</h1>
        @if (session('receptionist_error'))
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                {{ session('receptionist_error') }}</div>
        @endif
        @if (session('receptionist_success'))
            <div
                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                {{ session('receptionist_success') }}</div>
        @endif
        <div class="flex mb-3 ">
            <a href="/admin/receptionist/add"
                class="bg-klipaa font-medium text-md flex justify-center items-center text-white rounded px-3 h-12 text-decoration-none hover:brightness-90">+
                Buat Akun Resepsionis</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Resepsionis</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-2">Foto</th>
                                <th class="col-2">Nama</th>
                                <th class="col-2">Username</th>
                                <th class="col-2">Desa</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($receptionists as $receptionist)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td class="">
                                        <a href="/admin/receptionist/preview/{{ $receptionist->id }}">
                                            <img class="mx-auto"
                                                style="width: 50px; height: 50px; object-position: center; object-fit: cover;"
                                                src="{{ asset('storage/' . $receptionist->photo) }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $receptionist->name }}</td>
                                    <td>{{ $receptionist->username }}</td>
                                    <td>{{ Str::ucfirst($receptionist->address->name) }}</td>
                                    <td class="flex">
                                        <a class="rounded text-white w-1/2 h-10 text-center flex items-center justify-center text-decoration-none "
                                            href="/admin/receptionist/edit/{{ $receptionist->id }}">
                                            <img class="w-5" src="/img/edit.png" alt="">
                                        </a>
                                        <a class="rounded text-white w-1/2 h-10 text-center justify-center flex items-center text-decoration-none "
                                            onclick="return confirm('Yakin?')"
                                            href="/admin/receptionist/delete/{{ $receptionist->id }}">
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
