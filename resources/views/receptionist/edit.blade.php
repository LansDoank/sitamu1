<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>

    <!-- Begin Page Content -->
    <!-- /.container-fluid -->
    <div class="p-6 sm:p-8 rounded-xl bg-white max-w-5xl mx-auto my-10">
        <h1 class="text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
            Informasi Akun
        </h1>
        <p class="text-sm">Mohon isi dengan data yang benar</p>
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6" action="/admin/receptionist/update" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $oldReceptionist->id }}">
            <input type="hidden" name="old_password" value="{{ $oldReceptionist->password }}">
            <input type="hidden" name="old_province" value="{{ $oldReceptionist->province_code }}">
            <input type="hidden" name="old_district" value="{{ $oldReceptionist->district_code }}">
            <input type="hidden" name="old_sub_district" value="{{ $oldReceptionist->sub_district_code }}">
            <input type="hidden" name="old_village" value="{{ $oldReceptionist->village_code }}">
            <input type="hidden" name="oldPhoto" value="{{ $oldReceptionist->photo }}">
            <div>
                <label for="username"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" name="username" id="username"
                    class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@company.com" value="{{ $oldReceptionist->username }}" required>
            </div>
            <div class="relative flex">
                <div class="w-full">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        autocomplete="off">
                </div>
                <svg onclick="seePassword()" id="eye" class="cursor-pointer absolute right-4 top-11"
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                    <path
                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                </svg>
            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="name" id="name"
                    class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan nama disini" value="{{ $oldReceptionist->name }}" required>
            </div>
            <div class="flex flex-col items-start w-full">
                <label for="image" id="photo"
                    class="mb-2 w-full text-sm font-medium text-gray-900 dark:text-white">Foto
                    <div
                        class="w-full my-2 min-h-[150px] border border-gray-200 rounded-xl flex justify-center items-center">
                        <img class="w-full h-full max-w-[250px]" src="{{ asset("storage/$oldReceptionist->photo") }}"
                            alt="">
                    </div>
                </label>
                <input class="hidden" type="file" name="image" id="image">
            </div>
            <div class="flex flex-col items-start">
                <label for="province" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <select
                    class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="province" id="province" value="{{ $oldReceptionist->province_code }}">
                    <option disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->code }}"
                            {{ $oldReceptionist->province_code == $province->code ? 'selected' : '' }}>
                            {{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="district" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                <select
                    class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="district" id="district">
                    <option disabled selected
                        {{ $oldReceptionist->district_code == $oldReceptionist->district->code ? 'selected' : '' }}>
                        {{ $oldReceptionist->district->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district"
                    class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <select
                    class="bg-white border border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="sub_district" id="sub_district">
                    <option disabled selected
                        {{ $oldReceptionist->sub_district_code == $oldReceptionist->sub_district->code ? 'selected' : '' }}>
                        {{ $oldReceptionist->sub_district->name }}</option>
                </select>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</span></label>
                <select
                    class="bg-white border capitalize border-gray-300 text-gray-900 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="village" id="village">
                    <option disabled selected class="capitalize"
                        {{ $oldReceptionist->village_code == $oldReceptionist->address->code ? 'selected' : '' }}>
                        {{ $oldReceptionist->address->name }}</option>
                </select>
            </div>

            <button type="submit"
                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-xl text-base px-5 py-2.5 text-center hover:brightness-90">Perbarui
                Akun</button>

        </form>
    </div>
</x-dashboard>
