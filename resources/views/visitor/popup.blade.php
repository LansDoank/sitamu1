<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .bg-daun {
            background-image: url(/img/bgnowb.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="icon" href="/img/logo.png">
</head>
<body>
    <div class="w-full h-screen flex justify-center items-center bg-daun m-0">
        @if (Session::has('visitor_success'))
        <div
            class="lg:w-[400px] md:w-[350px] w-[250px] flex flex-col justify-center md:py-5 lg:h-[400px] md:h-[320px] h-[350px] items-center bg-white shadow z-20 border rounded-lg absolute mx-auto md:p-5 text-center" data-aos="fade-up" data-aos-duration="1500"> 
            <img class="md:w-28 lg:w-32 w-20" src="/img/checked.png" alt="">
            <h2 class="text-2xl font-semibold my-3 text-2xl">Success!</h2>
            <p class="lg:text-lg">{{ session('visitor_success') }}</p>
            <div class="flex flex-wrap md:flex-nowrap space-x-4 mt-3 gap-y-2 md:gap-y-0 md:gap-x-3">
                <a class="bg-red-600 rounded w-full md:w-36 lg:w-40 text-decoration-none text-white md:text-sm text-base lg:text-base py-3 px-4" href="/">Back</a>
                <a class="bg-blue-600 rounded w-full md:w-36 lg:w-40 text-decoration-none text-white md:text-sm text-base lg:text-base py-3 px-4 m-0" href="/form/desa">Tambah Data</a>
            </div>
        </div>
        @endif
        @if (Session::has('village-error'))
        <div
            class="lg:w-[400px] md:w-[350px] w-[250px] flex flex-col justify-center md:py-5 lg:h-[400px] md:h-[320px] h-[350px] items-center bg-white shadow z-20 border rounded-lg absolute mx-auto md:p-5 text-center" data-aos="fade-up" data-aos-duration="1500"> 
            <img class="md:w-28 lg:w-32 w-20" src="/img/cross.png" alt="">
            <h2 class="text-2xl font-semibold my-3 text-2xl">Error!</h2>
            <p class="lg:text-lg">{{ session('village-error') }}</p>
            <div class="flex flex-wrap md:flex-nowrap space-x-4 mt-3 gap-y-2 md:gap-y-0 md:gap-x-3">
                <a class="bg-red-600 rounded w-full md:w-36 lg:w-40 text-decoration-none text-white md:text-sm text-base lg:text-base py-3 px-4" href="/">Back</a>
                <a class="bg-blue-600 rounded w-full md:w-36 lg:w-40 text-decoration-none text-white md:text-sm text-base lg:text-base py-3 px-4 m-0" href="/form/desa">Cari Desa Lain</a>
            </div>
        </div>
        @endif
    </div>
</body>
</html>