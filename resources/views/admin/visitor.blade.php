<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>
    <div class="">

        <!-- Page Heading -->
        <h1 class="mb-2 text-2xl md:text-3xl text-gray-800">Tabel Tamu</h1>
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
                    class="bg-klipaa w-full md:w-auto font-medium text-md flex justify-center items-center text-white rounded px-3 h-12 text-decoration-none hover:brightness-90">+
                    Tambah Data Tamu</a>
                <div class="flex gap-3 flex-wrap md:w-[400px] w-full">
                    <a href="/generate/visitor/{{ $code }}"
                        class="bg-blue-600 text-white rounded px-4 text-center flex text-decoration-none items-center md:w-48 w-full justify-center font-medium h-12">Buat
                        Laporan</a>
                    <button onclick="downloadExcel()"
                        class="bg-red-600 text-white font-medium rounded px-4 md:w-48 w-full h-12">Download
                        Excel</button>
                </div>
            </div>
        @else
            <div class="flex mb-3 justify-between w-full flex-wrap">
                <a href="/admin/visitor/add/{{ $user->village_code }}"
                    class="bg-klipaa font-medium text-md mb-3 md:mb-0 flex justify-center items-center text-white rounded px-3 h-12 w-full md:w-40 md:text-sm lg:text-base lg:w-48 text-decoration-none hover:brightness-90">+
                    Buat Data Tamu</a>
                <div class="flex gap-3 flex-wrap md:w-[350px] lg:w-[400px] w-full">
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
</x-dashboard>
