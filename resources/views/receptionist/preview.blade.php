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
        <p class="text-sm">Berikut adalah informasi akun dari resepsionis</p>
        <div class="text-red-500 text-md">{{ session('login') }}</div>
        <form class="space-y-4 md:space-y-6">
            <div>
                <label for="username"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" name="username" id="username"
                    class=" bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=" " value="{{ $users->username }}" disabled>
            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="name" id="name"
                    class=" bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John Doe" value="{{ $users->name }}" disabled>
            </div>

            <div class="flex flex-col items-start w-full">
                <label for="visitor_photo" id="photo" class="mb-2 w-full">Foto
                </label>
                <div class="w-full flex justify-center">
                    <img class="w-full h-full object-cover max-w-[300px]" src="{{ asset('storage/' . $users->photo) }}"
                        alt="">
                </div>
            </div>
            <div class="flex flex-col items-start">
                <label for="province"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <input type="text" name="province" id="province"
                    class=" bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=" " value="{{ $users->province->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="district"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                <input type="text" name="district" id="district"
                    class=" bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=" " value="{{ $users->district->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="sub_district"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <input type="text" name="sub_district" id="sub_district"
                    class=" bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=" " value="{{ $users->sub_district->name }}" disabled>
            </div>
            <div class="flex flex-col items-start">
                <label for="village" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</label>
                <input type="text" name="village" id="village"
                    class="capitalize bg-gray-50 border border-gray-300 text-gray-600 rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=" " value="{{ $users->address->name }}" disabled>
            </div>

        </form>
    </div>
</x-dashboard>
