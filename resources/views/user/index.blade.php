<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar></x-navbar>
    <div id="hero" class="flex flex-col items-center">
        <div class="container w-full flex flex-wrap flex-col-reverse md:flex-row md:flex-nowrap justify-center items-center lg:h-[700px] md:h-[600px] py-16 md:py-12 md:px-10 lg:p-20">
            <div class="md:w-1/2 w-full flex flex-col justify-center p-5 md:p-0">
                <h1 class="text-klipaa font-poppins text-xl md:text-4xl lg:text-5xl font-semibold md:my-5 leading-snug" data-aos="fade-right"
                    data-aos-duration="1500">SELAMAT DATANG
                    DI SITAMU !</h1>
                <p class="lg:text-sm md:text-xs text-xs my-3 md:my-0 lg:text-sm text-slate-500 font-medium" data-aos="fade-right" data-aos-duration="1500"
                    data-aos-delay="300">Mudah, Cepat, dan Efisien! Buku Tamu Digital membantu
                    mencatat kunjungan warga dengan
                    lebih praktis dan modern. Tinggalkan pesan Anda dengan mudah dan pastikan setiap kunjungan tercatat
                    dengan baik</p>
                <div class="flex gap-5">

                    <a class="bg-klipaa lg:w-36 md:w-28 w-28 text-sm md:text-base flex font-medium justify-center items-center md:my-5 hover:brightness-90 text-white rounded h-12 md:h-14"
                        href="/form/desa" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500">Isi
                        Formulir</a>
                    <a class="bg-white lg:w-36 md:w-28 w-24 flex text-sm md:text-base font-medium justify-center items-center md:my-5 hover:brightness-90 text-klipaa shadow shadow-klipaa rounded h-12 md:h-14"
                        href="/login" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500">
                        Masuk</a>
                </div>
            </div>
            <div class="md:w-1/2 w-full flex md:justify-end justify-center items-center">
                <img class="w-[90%]" src="/img/hero.png" alt="" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-delay="500">
            </div>
        </div>
    </div>
    <div id="about" class="md:p-7 flex flex-col items-center">
        <div class="container bg-klipaa  md:rounded-2xl p-5 md:p-0 flex justify-center flex-col items-center md:p-10">
            <div class="md:mb-8" data-aos="fade-up" data-aos-duration="900">
                <h1 class="text-white text-xl md:text-3xl my-5 md:my-0 font-semibold">APA ITU SITAMU?</h1>
            </div>
            <div class="flex flex-wrap md:flex-nowrap">
                <figure class="md:w-1/2 my-5 md:my-0 w-full md:flex items-center">
                    <img src="/img/about.png" alt="" data-aos="fade-up" data-aos-delay="500"
                        data-aos-duration="1500">
                </figure>
                <div class="md:w-1/2 w-full flex flex-col justify-center items-start md:p-5">
                    <p class="text-white text-xs mb-3 md:text-xs lg:text-base md:mb-4" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1500">Sitamu
                        adalah platform digital yang dirancang khusus untuk mendukung
                        pengelolaan administrasi dan dokumentasi di tingkat desa. Sitamu digunakan oleh kantor desa
                        untuk mempermudah proses pencatatan, penyimpanan, dan pencarian berbagai data penting yang
                        berkaitan dengan kegiatan administratif desa
                    </p>
                    <p class="text-white text-xs md:text-xs lg:text-base" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1500">SITAMU
                        menjadi alat yang sangat efektif untuk meningkatkan efisiensi, transparansi, dan
                        akuntabilitas dalam pengelolaan administrasi desa, serta mendukung kemajuan digitalisasi di
                        tingkat pemerintahan desa.</p>

                    {{-- <button class="w-36 bg-white h-14 text-klipaa md:my-5 rounded font-medium" data-aos="fade-up"
                        data-aos-delay="700" data-aos-duration="1500">Selengkapnya</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div id="why" class="flex flex-col items-center md:p-5">
        <div class="my-10">
            <h1 class="font-semibold text-klipaa text-xl md:text-3xl" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="900">Mengapa memilih Sitamu?</h1>
        </div>
        <div class="container border p-5 md:p-10 border-klipaa md:rounded-2xl flex flex-wrap gap-5 md:flex-nowrap justify-center md:gap-5 lg:gap-10 md:rounded-lg">
            <div class="card bg-klipaa md:py-8 text-white text-center p-5 w-full md:w-48 lg:w-80 shrink-0 rounded flex flex-col items-center"
                data-aos="fade-up" data-aos-delay="300" data-aos-duration="1500">
                <div class="card-image md:mb-3 ">
                    <img class="lg:w-32 md:w-24 w-24" src="/img/eficient.png" alt="">
                </div>
                <div class="card-body">
                    <h2 class="font-medium lg:my-5 md:text-lg lg:text-2xl mb-3">Efisiensi Waktu dan
                        Proses</h2>
                    <p class="lg:text-sm md:text-[10px] text-xs font-normal">Dengan SITAMU, semua proses administrasi yang biasanya memakan waktu
                        dan tenaga, seperti
                        pengelolaan data tamu yang berkunjung,, bisa dilakukan dengan lebih cepat dan efektif.</p>
                </div>
            </div>
            <div class="card bg-klipaa md:py-8 text-white text-center p-5 w-full md:w-48 lg:w-80 shrink-0 rounded flex flex-col items-center"
                data-aos="fade-up" data-aos-delay="500" data-aos-duration="1500">
                <div class="card-image md:mb-5 ">
                    <img class="lg:w-32 md:w-24 w-24" src="/img/security.png" alt="">
                </div>
                <div class="card-body">
                    <h2 class="font-medium lg:my-5 md:text-lg lg:text-2xl mb-3">Keamanan Data yang
                        Terjamin</h2>
                    <p class="lg:text-sm md:text-[10px] text-xs font-normal">Keamanan data menjadi prioritas utama dalam SITAMU. Sistem ini
                        menggunakan enkripsi dan pengamanan yang canggih untuk memastikan bahwa semua data yang
                        tersimpan terlindungi dari akses yang tidak sah.</p>
                </div>
            </div>
            <div class="card bg-klipaa md:py-8 text-white text-center p-5 w-full md:w-48 lg:w-80 shrink-0 rounded flex flex-col items-center"
                data-aos="fade-up" data-aos-delay="700" data-aos-duration="1500">
                <div class="card-image md:mb-3 ">
                    <img class="lg:w-32 md:w-24 w-24" src="/img/transplatation.png" alt="">
                </div>
                <div class="card-body">
                    <h2 class="font-medium lg:my-5 md:text-lg lg:text-2xl mb-3">Transparansi dan Akuntabilitas</h2>
                    <p class="lg:text-sm md:text-[10px] text-xs font-normal text-center md:mt-3">SITAMU menyediakan fitur yang memungkinkan semua data dan informasi
                        penting tercatat dengan rapi dan transparan.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="preview" class="flex flex-col items-center md:m-0 md:p-5">
        <div class="text-center my-10 md:my-10">
            <h1 class="text-klipaa font-semibold text-2xl md:text-3xl" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="900">Pratinjau Aplikasi</h1>
        </div>
        <div class="container relative bg-klipaa p-10 md:rounded-2xl flex flex-col justify-center items-center">
            <div>
                <!-- Slider main container -->
                <div class="swiper relative">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img class="w-full rounded-xl h-full object-cover object-center" src="/img/mobile.png"
                                alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full rounded-xl h-full object-cover object-center" src="/img/tablet.png"
                                alt="">
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="guide" class="flex flex-col items-center md:p-5 md:my-10">
        <div class="md:my-10">
            <h1 class="text-klipaa text-xl my-10 md:text-3xl font-semibold" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="900">Panduan Penggunaan Sitamu</h1>
        </div>
        <div class="container flex flex-wrap md:flex-nowrap border md:rounded-2xl justify-center p-5 gap-5 md:p-10 lg:gap-10 md:gap-5 border-klipaa">
            <div class="card max-w-xs h-72 md:h-96 rounded-lg text-klipaa border border-klipaa text-center bg-white  md:p-5 lg:h-80 md:h-64 flex flex-col items-center justify-center"
                data-aos="flip-up" data-aos-delay="300" data-aos-duration="1500">
                <figure class="card-header flex justify-center items-center md:my-7">
                    <img class="lg:w-18 md:w-10 w-8" src="/img/one.png" alt="aa">
                </figure>
                <div class="card-body p-5 md:p-0">
                    <p class="font-medium lg:text-lg md:text-sm">Scan barcode
                        untuk menuju ke halaman utama.</p>
                </div>
            </div>
            <div class="card max-w-xs h-72 md:h-96 rounded-lg text-klipaa border border-klipaa text-center bg-white  md:p-5 lg:h-80 md:h-64 flex flex-col items-center justify-center"
                data-aos="flip-up" data-aos-delay="500" data-aos-duration="1500">
                <figure class="card-header flex justify-center items-center md:my-7">
                    <img class="lg:w-24 md:w-20 w-16" src="/img/two.png" alt="aa">
                </figure>
                <div class="card-body p-5 md:p-0">
                    <p class="font-medium lg:text-lg md:text-sm">Masuk ke halaman tamu untuk ke halaman formulir.</p>
                </div>
            </div>
            <div class="card max-w-xs h-72 md:h-96 rounded-lg text-klipaa border border-klipaa text-center bg-white  md:p-5 lg:h-80 md:h-64 flex flex-col items-center justify-center"
                data-aos="flip-up" data-aos-delay="700" data-aos-duration="1500">
                <figure class="card-header flex justify-center items-center md:my-7">
                    <img class="lg:w-24 md:w-20 w-16" src="/img/three.png" alt="aa">
                </figure>
                <div class="card-body p-5 md:p-0">
                    <p class="font-medium lg:text-lg md:text-sm">Isi formulir data
                        buku tamu dengan benar lalu tekan submit.</p>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="w-full text-white bg-klipaa md:px-10 md:pt-8">
        <div class="footer-body p-5 flex flex-wrap md:flex-nowrap justify-between">
            <div class="logo lg:w-2/3 md:w-1/2 mb-5 md:m-0">
                <div class="flex items-center font-semibold text-3xl">
                    <img class="w-10 md:w-14" src="/img/logo.png" alt="Sitamu">
                    <h5 class="text-2xl md:text-3xl">Sitamu</h5>
                </div>
                <p class="font-medium text-sm md:text-base ms-2 md:m-0">Buku Tamu Digital</p>
            </div>
            <div class="lg:w-1/3 md:w-1/2">
                <ul class="text-white font-medium text-lg md:text-2xl">
                    Kontak
                    <li class="my-5">
                        <div class="flex">
                            <img class="w-5 h-5 me-2" src="/img/telephone.png" alt="">
                            <p class="md:text-sm text-xs font-medium">+62 823-1168-2447</p>
                        </div>
                    </li>
                    <li class="my-5">
                        <div class="flex">
                            <img class="w-5 h-5 me-2" src="/img/mail.png" alt="">
                            <p class="md:text-sm text-xs font-medium">sitamu19@gmail.com</p>
                        </div>
                    </li>
                    <li class="my-5">
                        <div class="flex">
                            <img class="w-5 h-5 me-2" src="/img/location.png" alt="">
                            <p class="md:text-sm text-xs font-medium">Perum Rama Cipta Indah No.Blok A3, Jayawaras, Kec. Tarogong
                                Kidul, Kabupaten Garut, Jawa Barat 44151</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="copyright flex justify-between p-5">
            <div class="">
                &copy; 2025 Sitamu
            </div>
            <div class="flex gap-5">
                <a href="#">
                    <img class="w-5" src="/img/whatsapp.png" alt="">
                </a>
                <a href="#">
                    <img class="w-5" src="/img/facebook.png" alt="">
                </a>
                <a href="#">
                    <img class="w-5" src="/img/instagram.png" alt="">
                </a>
            </div>
        </div>
    </footer>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
</x-layout>
