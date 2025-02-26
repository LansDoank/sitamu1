<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
    <link rel="icon" href="/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    </script>
</head>
<style>


    .swiper {
        width: 600px;
        height: 800px;
    }

    html {
        width: 100%;
        overflow-x: hidden;
    }

    * {
        /* border: 1px solid red; */
    }

    .nav-link:hover{
        color: #65AE3A;
        border-bottom: 2px solid #65AE3A;
    }

    /* .swiper-button-next {
        width: 50px !important;
        height: 50px !important;
    } */

    .bg-daun {
        background-image: url(/img/bgnowb.jpg);
        /* background-size: ; */
        background-repeat: no-repeat;
        background-position: center;
    }

    @media screen and (max-width:576px) {
        .swiper {
            width: 250px;
            height: 300px;
        }
    }
</style>

<body class="overflow-x-hidden">
    {{ $slot }}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>
