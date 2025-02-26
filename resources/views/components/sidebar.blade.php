<ul class="navbar-nav bg-klipaa relative sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="text-white font-semibold flex items-center justify-center text-decoration-none" href="/admin/dashboard">
        <img class="w-12" src="/img/logo.png" alt="">
        <p id="brand" class="text-2xl font-semibold m-0">
            Sitamu
        </p>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasbor</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Tables -->
    <li class="{{ request()->is('admin/visitor') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="/admin/visitor">
            <div class="flex flex-wrap md:flex-nowrap justify-center md:justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-people-fill w-full md:w-max" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg>
                <span class="md:ms-2">Data Tamu</span>
            </div>
        </a>
    </li>
    @if ($user == '1')
        <li class="{{ request()->is('admin/receptionist') ? 'active' : '' }} nav-item">
            <a class="nav-link" href="/admin/receptionist">
                <div class="flex flex-wrap items-center justify-center md:flex-nowrap md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill w-full md:w-max" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <span class="md:ms-2">Resepsionis</span>
                </div>
            </a>
        </li>
    @endif
    {{-- <li class="{{ request()->is('admin/master_data') ? 'active' : '' }} nav-item">

        <ul class="nav-link flex absolute Z-50 overflow-hidden justify-end group cursor-pointer">
            <div class="flex flex-wrap md:flex-nowrap mb-2 justify-center md:justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-database-fill w-full md:w-max" viewBox="0 0 16 16">
                    <path
                        d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223" />
                    <path
                        d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                    <path
                        d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                    <path
                        d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                </svg>
                <span class="md:ms-2">Filter Data &#129107;</span>
            </div>

            <div
                class="absolute -z-50 transition-all duration-500 -translate-y-80  group-hover:translate-y-0 group-hover:static">
                <ul class="hidden group-hover:block w-36  text-white text-sm p-2 ps-3 rounded flex flex-col items-end">
                    <li class="font-semibold">Tamu</li>
                    <ul class="flex flex-col items-end">
                        <li class="rounded-t w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="/admin/master_data/tamu/name">Nama</a>
                        </li>
                        <li class="rounded-b w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="/admin/master_data/tamu/telephone">No.
                                Telp</a>
                        </li>
                        <li class="rounded-b w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="/admin/master_data/tamu/adress">Alamat</a>
                        </li>
                        <li class="rounded-b w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="/admin/master_data/tamu/date">Tanggal</a>
                        </li>
                        <li class="rounded-b w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white"
                                href="/admin/master_data/tamu/objective">Tujuan</a>
                        </li>
                    </ul>
                </ul>
                <ul class="hidden group-hover:block w-36  text-white text-sm p-2 ps-3 rounded flex flex-col items-end">
                    <li class="font-semibold">Resepsionis</li>
                    <ul class="flex flex-col items-end">
                        <li class="rounded-t w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="#">Nama</a>
                        </li>
                        <li class="rounded-b w-full text-end px-1 my-1 py-1">
                            <a class="text-decoration-none text-white" href="#">Alamat</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </ul>

    </li> --}}
    <li class="{{ request()->is('admin/qr_code') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="/admin/qr_code">
            <div class="flex flex-wrap md:flex-nowrap justify-center md:justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-qr-code w-full md:w-max" viewBox="0 0 16 16">
                    <path d="M2 2h2v2H2z" />
                    <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z" />
                    <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z" />
                    <path
                        d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z" />
                    <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z" />
                </svg>
                <span class="md:ms-2">Kode Qr</span>
            </div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>
