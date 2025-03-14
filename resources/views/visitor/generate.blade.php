<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" href="/img/logo.png">
    <style>
        @media screen and (max-width:576px) {
            #brand {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <table class="table border table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="">No</th>
                    <th class="">Foto</th>
                    <th class="">Nama</th>
                    <th class="">Instansi</th>
                    <th class="">No. Telp</th>
                    <th class="">Check-in</th>
                    <th class="">Check-out</th>
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
                        <td>{{ $visitor->fullname }}</td>
                        <td>{{ $visitor->institution }}</td>
                        <td>{{ $visitor->telephone }}</td>
                        <td>{{ $visitor->check_in }}</td>
                        <td>{{ $visitor->check_out }}</td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    {{-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script> --}}
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
</body>

</html>
