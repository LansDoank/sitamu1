<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>
    <div class="">
        <!-- Page Heading -->
        <h1 class="mb-2 text-xl md:text-3xl text-gray-800">List Data Desa Yang Terdaftar</h1>
        @if (session('visitor_error'))
            <div class="bg-red-100 mt-2 mb-2 rounded border border-1 border-red-900 text-center px-5 py-2 text-red-900">
                {{ session('visitor_error') }}</div>
        @endif
        @if (session('visitor_success'))
            <div
                class="bg-green-100 mt-2 mb-2 rounded border border-1 border-green-900 text-center px-5 py-2 text-green-900">
                {{ session('visitor_success') }}</div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Desa</h6>
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
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($villages as $village)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $village->province->name }}</td>
                                    <td>{{ $village->district->name }}</td>
                                    <td>{{ $village->subdistrict->name }}</td>
                                    <td>{{ $village->name }}</td>
                                    <td class="flex">
                                        <a class="rounded bg-blue-600 text-white px-5 h-10 text-center flex items-center justify-center text-decoration-none "
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
</x-dashboard>
