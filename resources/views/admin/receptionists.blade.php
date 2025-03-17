<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        @if (session('receptionist_error'))
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                {{ session('receptionist_error') }}</div>
        @endif
        @if (session('receptionist_success'))
            <div
                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                {{ session('receptionist_success') }}</div>
        @endif
        <div class="flex my-3 ">
            <a href="/admin/receptionist/add"
                class="bg-klipaa font-medium text-md flex justify-center items-center text-white rounded-lg px-2 py-1 text-decoration-none hover:brightness-90">+
                Tambah Resepsionis</a>
        </div>

        <!-- DataTales Example -->
        <div class="card bg-white mb-4">
            <div class="card-header border-none bg-white py-3">
                <h6 class="m-0 font-weight-bold text-klipaa">Daftar Data Resepsionis</h6>
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
                                                src="{{ asset('storage/' . $receptionist->photo) ?? '/public/img/default_profile.jpeg' }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $receptionist->name }}</td>
                                    <td>{{ $receptionist->username }}</td>
                                    <td>{{ Str::ucfirst($receptionist->address->name) }}</td>
                                    <td>
                                        <div class="flex justify-center items-center gap-2">
                                            <a class="rounded-lg text-white bg-yellow-500 w-fit px-3 py-1 text-center flex items-center justify-center gap-3 text-decoration-none "
                                                href="/admin/receptionist/edit/{{ $receptionist->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m14.363 5.652l1.48-1.48a2 2 0 0 1 2.829 0l1.414 1.414a2 2 0 0 1 0 2.828l-1.48 1.48m-4.243-4.242l-9.616 9.615a2 2 0 0 0-.578 1.238l-.242 2.74a1 1 0 0 0 1.084 1.085l2.74-.242a2 2 0 0 0 1.24-.578l9.615-9.616m-4.243-4.242l4.243 4.242" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a class="rounded-lg text-white bg-red-500 w-fit px-2 py-1 text-center flex items-center justify-center gap-3 text-decoration-non "
                                                onclick="return confirm('Yakin?')"
                                                href="/admin/receptionist/delete/{{ $receptionist->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5"
                                                        d="m20 9l-1.995 11.346A2 2 0 0 1 16.035 22h-8.07a2 2 0 0 1-1.97-1.654L4 9m17-3h-5.625M3 6h5.625m0 0V4a2 2 0 0 1 2-2h2.75a2 2 0 0 1 2 2v2m-6.75 0h6.75" />
                                                </svg>
                                                Hapus
                                            </a>
                                        </div>
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
