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
            <a class="text-decoration-none" href="/admin/visitor/{{ $user->village_code }}">
                <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Pratinjau Data Tamu</h1>
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
    <form action="/admin/visitor/update" method="POST" enctype="multipart/form-data"
        class="shadow mx-auto my-10 max-w-4xl p-8 bg-white border border-gray-200 rounded-lg">
        @csrf
        <div class="form-header">
            <div class="flex items-center md:my-3">
                <img class="w-10 me-2" src="/img/logo.png" alt="">
                <h5 class="text-klipaa font-semibold text-2xl mb-0">TamuDesa</h5>
            </div>
        </div>
        <div class="form-body">

            <ul class="md:my-5">
                <li class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 md:my-3">
                    <div class="flex flex-col items-start w-full md:w-1/2">
                        <label for="fullname" class="mb-2">Nama Lengkap</label>
                        <input type="text" name="fullname" id="fullname"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan nama anda" value="{{ $visitor->fullname }}" disabled>
                    </div>
                    <div class="flex flex-col items-start md:ps-5 w-full md:w-1/2">
                        <label for="institution" class="mb-2">Instansi</label>
                        <input type="text" name="institution" id="institution"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan nama anda" value="{{ $visitor->institution }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <textarea class="hidden w-full border border-gray-200 px-3 py-2" id="institution-textarea"
                        placeholder="Sebutkan Instansi Anda"></textarea>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="telephone" class="mb-2">No. Telepon</label>
                        <input type="text" name="telephone" id="telephone"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan telepon anda" value="{{ $visitor->telephone }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="province" class="mb-2">Provinsi</label>
                        <input type="text" name="province" id="province"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan telepon anda" value="{{ $visitor->province->name }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="district" class="mb-2">Kabupaten</label>
                        <input type="text" name="district" id="district"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan kabupaten anda" value="{{ $visitor->district->name }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="sub_district" class="mb-2">Kecamatan</label>
                        <input type="text" name="sub_district" id="sub_district"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan kecamatan anda" value="{{ $visitor->subdistrict->name }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="village" class="mb-2">Desa</label>
                        <input type="text" name="village" id="village"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan desa anda" value="{{ $visitor->village->name }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-wrap md:flex-nowrap w-full gap-3 md:gap-0">
                        <div class="flex flex-col items-start w-full md:w-1/2">
                            <label for="check_in" class="mb-2">Tanggal Datang</label>
                            <input type="datetime-local" name="check_in" id="check_in"
                                class="form-input text-gray-600 border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                value="{{ $visitor->check_in }}" disabled>
                        </div>
                        <div class="flex flex-col items-start w-full md:w-1/2">
                            <label for="check_out" class="mb-2">Tanggal Pulang</label>
                            <input type="datetime-local" name="check_out" id="check_out"
                                class="form-input text-gray-600 border border-gray-200 px-2 h-10 w-full md:w-1/2"
                                value="{{ $visitor->check_out }}" disabled>
                        </div>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="objective" class="mb-2">Tujuan</label>
                        <input type="text" name="objective" id="objective"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan telepon anda" value="{{ $visitor->objective }}" disabled>
                    </div>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label class="mb-2">Lokasi Tujuan</label>
                        <input type="text" disabled value="{{ $visitor->visitType->name }}"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3">
                    </div>
                </li>
                <li class="md:my-3">
                    <textarea class="hidden w-full border border-gray-200 px-3 py-2" name="objective" id="objective_textarea"
                        placeholder="Sebutkan Tujuan Anda"></textarea>
                </li>
                <li class="md:my-3">
                    <div class="flex flex-col items-start">
                        <label for="i_n_i" class="mb-2">Keterangan</label>
                        <input type="text" name="i_n_i" id="i_n_i"
                            class="form-input border border-gray-200 rounded w-full h-10 px-3" required
                            placeholder="Masukkan telepon anda" value="{{ $visitor->i_n_i }}" disabled>
                    </div>
                </li>
                <li class="md:my-3 ">
                    <div class="flex flex-col items-start w-full">
                        <label for="visitor_photo" id="photo" class="mb-2 w-full">Foto
                        </label>
                        <div class="w-full flex justify-center">
                            <img class="w-full max-w-[300px] h-full object-cover"
                                src="{{ asset('storage/' . $visitor->visitor_photo) }}" alt="">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</x-dashboard>
