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
            <a class="text-decoration-none" href="/admin/receptionist">
                <h1 class="text-gray-600 text-sm md:text-2xl mb-0">&laquo; Pratinjau Data Resepsionis</h1>
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
            Pratinjau Akun Resepsionis
        </h1>
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6">
            <div>
                <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John Doe" value="{{ $users->name }}" disabled>
            </div>
            <div>
                <label for="username"
                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" name="username" id="username"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john123" value="{{ $users->username }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="province"
                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Provinsi</label>
                <input type="text" name="province" id="province"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john123" value="{{ $users->province->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="district"
                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kabupaten</label>
                <input type="text" name="district" id="district"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john123" value="{{ $users->district->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district"
                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <input type="text" name="sub_district" id="sub_district"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john123" value="{{ $users->sub_district->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Desa</label>
                <input type="text" name="village" id="village"
                    class="bg-gray-50 border border-gray-300 text-gray-600 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john123" value="{{ $users->address->name }}" disabled>
            </div>
            <div class="flex flex-col items-start w-full">
                <label for="visitor_photo" id="photo" class="mb-2 w-full">Foto
                </label>
                <div class="w-full flex justify-center">
                    <img class="w-full h-full object-cover max-w-[300px]" src="{{ asset('storage/' . $users->photo) }}"
                        alt="">
                </div>
            </div>
        </form>
    </div>
</x-dashboard>
