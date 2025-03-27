a
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
        @foreach ($desas as $village)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $village->province->name }}</td>
                <td>{{ $village->district->name }}</td>
                <td>{{ $village->subdistrict->name }}</td>
                <td>{{ Str::ucfirst($village->name) }}</td>
                <td>{{ $visitor->where('village_code',$village->village_code)->count() }}</td>
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