<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:user>{{ $user->role_id }}</x-slot:user>
    <x-slot:isreceptionist>{{ $isreceptionist }}</x-slot:isreceptionist>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:is_admin>{{ $is_admin }}</x-slot:is_admin>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tamu (HARIAN)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guestDaily }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="/img/guests.png" class="w-12" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tamu (Mingguan)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guestWeekly }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="/img/guests.png" class="w-12" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger border border-s-[#EE6164] shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Tamu
                                    (Bulanan)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ $guestMonthly }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="/img/guests.png" class="w-12" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Tamu (TAHUNAN)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guestYearly }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="/img/guests.png" class="w-12" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row m-0">

            <!-- Area Chart -->
            <div class="w-full md:w-1/2 md:px-2">
                <div class="w-full shadow mb-4 p-0 m-0 g-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header w-full py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class=" font-weight-bold text-primary">Pratinjau</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body w-full bg-white">
                        <div class="w-full">
                            <canvas id="line-chart" class="w-full" style="width: 100% !important;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 md:px-2">
                <div class="card w-full shadow mb-4 p-0 m-0 g-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Instansi</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body w-full">
                        <div class="w-full">
                            <canvas id="overview" class="w-full" style="width: 100% !important;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="md:w-1/2 w-full md:px-2">
                <div class="card shadow mb-4 p-0 m-0 g-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tujuan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body w-full flex flex-col-reverse md:flex-row flex-wrap md:flex-nowrap">
                        <div class="flex md:w-1/2 flex-col justify-center p-2">
                            <ul class="text-decoration-none list-none mb-0">
                                <li class="flex my-3 md:my-1 lg:my-3 text-sm md:text-[10px] md:leading-snug lg:text-sm justify-between">
                                    Studi Banding
                                    <div class="md:mx-5 flex">
                                        {{ $studi_banding }}
                                    </div>
                                </li>
                                <li class="flex my-3 md:my-1 lg:my-3 text-sm md:text-[10px] md:leading-snug lg:text-sm justify-between">
                                    Cari Informasi
                                    <div class="md:mx-5 flex">
                                        {{ $cari_informasi }}
                                    </div>
                                </li>
                                <li class="flex my-3 md:my-1 lg:my-3 text-sm md:text-[10px] md:leading-snug lg:text-sm justify-between">
                                    Pembinaan
                                    <div class="md:mx-5 flex">
                                        {{ $pembinaan }}
                                    </div>
                                </li>
                                <li class="flex my-3 md:my-1 lg:my-3 text-sm md:text-[10px] md:leading-snug lg:text-sm justify-between">
                                    Koordinasi
                                    <div class="md:mx-5 flex">
                                        {{ $koordinasi }}
                                    </div>
                                </li>
                                <li class="flex my-3 my-3 md:my-1 lg:mb-0 text-sm md:text-[10px] md:leading-snug lg:text-sm justify-between">
                                    Lainnya
                                    <div class="md:mx-5 flex">
                                        {{ $lainnya }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="flex w-full justify-center items-center md:w-1/2 lg:px-0">
                            <canvas id="pie-chart" class="w-full"></canvas>
                        </div>

                    </div>
                </div>
            </div>



            <div class="md:w-1/2 w-full md:px-2">
                <div class="card shadow mb-4 p-0 m-0 g-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Waktu</h6>
                    </div>


                    <!-- Card Body -->
                    <div class="card-body w-full">
                        <div class="w-full">
                            <canvas id="waktu-chart" class="w-full" style="width: 100% !important;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</x-dashboard>
