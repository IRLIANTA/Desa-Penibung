@extends('admin.layouts.app')
@section('content')
    <div class="gap-3 sm:gap-3.5 flex flex-col px-2 sm:px-4">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div class="gap-1 lg:gap-2 flex flex-col">
                <h1 class="text-lg sm:text-xl lg:text-2xl text-black font-semibold">Statistik Desa</h1>
            </div>

            @if (auth()->check())
                <button data-modal="Modal-Edit-Statistik"
                    class="flex items-center rounded-2xl py-2 px-3 gap-2 sm:gap-[10px] bg-desa-yellow w-full sm:w-auto justify-center">
                    <p class="font-medium text-black text-sm sm:text-base">Ubah Statistik</p>
                    <img src="assets/images/icons/edit-black.svg" class="flex size-5 sm:size-6 shrink-0" alt="icon">
                </button>
            @endif
        </div>

        <!-- Row 1: Main Stats -->
        <div id="Row-1" class="flex flex-col lg:flex-row gap-3 sm:gap-[14px]">
            <!-- Info Card -->
            <div class="flex flex-col w-full lg:w-[38%] h-auto rounded-2xl p-4 sm:p-6 gap-4 sm:gap-6 gradient-vertical">
                <img src="assets/images/icons/gift-orange-background.svg" class="flex size-16 sm:size-[86px] shrink-0"
                    alt="icon">
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-lime">— Informasi Statistik Desa Penibung</p>
                    <p class="font-semibold text-lg sm:text-2xl text-white">Status Desa = Pesisir</p>
                    <p class="text-white text-sm sm:text-base">Kunjungi Halaman Utama untuk mengetahui Tentang Seputar dan
                        Geografis Desa
                        Penibung.</p>
                </div>
                <a href="{{ route('profile.index') }}"
                    class="flex items-center justify-between rounded-2xl p-3 sm:p-4 gap-2 sm:gap-[10px] bg-white">
                    <span class="font-medium text-desa-dark-green leading-5 text-sm sm:text-base">Kunjungi Halaman
                        Profile</span>
                    <img src="assets/images/icons/add-square-dark-green.svg" class="flex size-5 sm:size-6 shrink-0"
                        alt="icon">
                </a>
            </div>

            <!-- Statistics Grid -->
            <section id="Statistics" class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-[14px] flex-1">
                <!-- Population Card -->
                <div class="card flex flex-col w-full rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah Penduduk</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_penduduk'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Development Card -->
                <div class="card flex flex-col w-full rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Pembangunan</p>
                        <img src="assets/images/icons/buildings-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('pembangunan'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Houses Card -->
                <div class="card flex flex-col w-full rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah Rumah</p>
                        <img src="assets/images/icons/crown-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_rumah'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Events Card -->
                <div class="card flex flex-col w-full rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Total Events</p>
                        <img src="assets/images/icons/calendar-2-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">12</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Population Edit Button -->
        @if (auth()->check())
            <div id="Header" class="flex">
                <button data-modal="Modal-Edit-Penduduk"
                    class="flex items-center rounded-2xl py-2 sm:py-3 px-3 sm:px-4 gap-2 sm:gap-[10px] bg-desa-yellow w-full sm:w-auto justify-center">
                    <p class="font-medium text-black text-sm sm:text-base">Ubah Penduduk</p>
                    <img src="assets/images/icons/edit-black.svg" class="flex size-5 sm:size-6 shrink-0" alt="icon">
                </button>
            </div>
        @endif

        <!-- Row 2: Population Details -->
        <div id="Row-2" class="flex gap-3 sm:gap-[14px]">
            <section id="Statistics" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-[14px] w-full">
                <!-- Male Population -->
                <div class="card flex flex-col rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah Penduduk Pria</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_pria'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Female Population -->
                <div class="card flex flex-col rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah Penduduk Perempuan</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_wanita'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Head of Family -->
                <div class="card flex flex-col rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah Kepala Keluarga</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_kepala_keluarga'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Female Head of Family -->
                <div class="card flex flex-col rounded-2xl p-4 sm:p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary text-sm sm:text-base">Jumlah KK P</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-10 sm:size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 sm:gap-[6px]">
                        <p class="font-semibold text-2xl sm:text-[32px] leading-8 sm:leading-10">
                            {{ number_format(get_statistik('jml_kk'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg"
                                class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Row 4: Infographics and Hamlet Info -->
        <div id="Row-4" class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-[14px]">
            <!-- Village Infographics -->
            <section id="Bantuan-Sosial" class="flex flex-col rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-4 sm:p-6">
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-lg sm:text-[20px] leading-6 sm:leading-[25px]">Infografis Desa</p>
                    </div>

                    <!-- Hamlet Count -->
                    <div class="card flex items-center w-full gap-3">
                        <div
                            class="flex size-16 sm:size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-7 sm:size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 sm:gap-[6px] w-full">
                            <p class="font-semibold text-lg sm:text-xl leading-6 sm:leading-[25px]">
                                {{ number_format(get_dusun()->count(), 0, ',', '.') }}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1 text-sm sm:text-base">Jumlah Dusun</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-desa-foreshadow">

                    <!-- RW Count -->
                    <div class="card flex items-center w-full gap-3">
                        <div
                            class="flex size-16 sm:size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-7 sm:size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 sm:gap-[6px] w-full">
                            <p class="font-semibold text-lg sm:text-xl leading-6 sm:leading-[25px]">
                                {{ number_format(sum_rw(), 0, ',', '.') }}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1 text-sm sm:text-base">Jumlah Rukun Warga</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-desa-foreshadow">

                    <!-- RT Count -->
                    <div class="card flex items-center w-full gap-3">
                        <div
                            class="flex size-16 sm:size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-7 sm:size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 sm:gap-[6px] w-full">
                            <p class="font-semibold text-lg sm:text-xl leading-6 sm:leading-[25px]">
                                {{ number_format(sum_rt(), 0, ',', '.') }}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1 text-sm sm:text-base">Jumlah Rukun Tetangga</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Hamlet Information -->
            <section id="Informasi-Dusun" class="flex flex-col rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <p class="font-semibold text-lg sm:text-[20px] leading-6 sm:leading-[25px]">Informasi Dusun</p>

                        @if (auth()->check())
                            <a href="{{ route('dashboard.editdusun') }}"
                                class="w-full sm:w-[100px] rounded-full p-3 flex items-center justify-center bg-desa-yellow hover:bg-yellow-600 transition">
                                <span class="font-semibold text-xs text-black uppercase">Edit</span>
                            </a>
                        @endif
                    </div>

                    @forelse ($dusun as $index => $d)
                        @if ($index < 3)
                            <div class="card flex items-center w-full gap-3">
                                <div
                                    class="flex size-16 sm:size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                                    <img src="assets/images/icons/money-dark-green.svg"
                                        class="flex size-7 sm:size-9 shrink-0" alt="icon">
                                </div>
                                <div class="flex flex-col gap-1 sm:gap-[6px] w-full">
                                    <p class="font-semibold text-lg sm:text-xl leading-6 sm:leading-[25px]">
                                        {{ $d->dusun }}</p>
                                    <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                        <img src="assets/images/icons/profile-secondary-green.svg"
                                            class="flex size-4 sm:size-[18px] shrink-0" alt="icon">
                                        <span class="line-clamp-1 text-sm sm:text-base">{{ $d->nama_kepala_dusun }}</span>
                                    </div>
                                </div>
                            </div>
                            @if ($index < 2 && $index < count($dusun) - 1)
                                <hr class="border-desa-foreshadow">
                            @endif
                        @elseif ($index == 3)
                            <a href="{{ route('dashboard.editdusun') }}"
                                class="inline-block px-4 py-2 text-blue-600 font-semibold rounded-lg hover:text-blue-700 transition text-center">
                                Lihat Lainnya
                            </a>
                            @break
                        @endif
                    @empty
                        <div class="card flex items-center text-center w-full gap-3">
                            <div class="flex flex-col gap-1 sm:gap-[6px] w-full">
                                <p
                                    class="font-semibold text-desa-secondary text-lg sm:text-xl leading-6 sm:leading-[25px]">
                                    Tidak ada dusun tersedia</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>

        <!-- Row 3: Statistics Chart -->
        <div id="Row-3" class="flex flex-col gap-3 sm:gap-[14px]">
            <section id="statistik-Penduduk" class="flex flex-col gap-4 p-4 sm:p-6 rounded-2xl bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-medium text-desa-secondary text-sm sm:text-base">Statistics Desa</p>
                    <img src="assets/images/icons/profile-2user-foreshadow-background.svg"
                        class="flex size-10 sm:size-12 shrink-0" alt="icon">
                </div>

                <div class="relative">
                    <div class="absolute inset-0 flex flex-col gap-1 justify-center items-center text-center">
                        @php
                            $totalPria = $penduduk->sum('jml_pria');
                            $totalWanita = $penduduk->sum('jml_wanita');
                            $totalKepalaKeluarga = $penduduk->sum('jml_kepala_keluarga');
                            $totalKKP = $penduduk->sum('jml_kk');
                            $totalAll = $totalPria + $totalWanita + $totalKepalaKeluarga + $totalKKP;
                        @endphp
                        <p class="font-semibold text-xl sm:text-[32px] leading-7 sm:leading-10">
                            {{ number_format($totalAll, 0, ',', '.') }}</p>
                        <p class="font-medium text-xs sm:text-sm text-desa-secondary">Statistics Desa</p>
                    </div>
                    <canvas id="myChart" class="size-64 sm:size-[288px] mx-auto" data-total-pria="{{ $totalPria }}"
                        data-total-wanita="{{ $totalWanita }}" data-total-kepala-keluarga="{{ $totalKepalaKeluarga }}"
                        data-total-kkp="{{ $totalKKP }}">
                    </canvas>
                </div>

                <div class="flex flex-col gap-3 sm:gap-4">
                    <!-- Male Statistics -->
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex text-sm sm:text-base">
                                <span class="block size-2 rounded-full my-auto bg-desa-dark-green mr-2"></span>
                                Pria
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Rentang usia: 32-36 tahun</p>
                        </div>
                        <p class="flex items-center font-medium leading-5 text-sm sm:text-base">
                            {{ number_format(get_statistik('jml_pria'), 0, ',', '.') }}
                            <img src="assets/images/icons/user-square-dark-green.svg"
                                class="flex size-4 sm:size-[18px] shrink-0 ml-0.5" alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">

                    <!-- Female Statistics -->
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex text-sm sm:text-base">
                                <span class="block size-2 rounded-full my-auto bg-desa-soft-green mr-2"></span>
                                Wanita
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Rentang usia: 26-31 tahun</p>
                        </div>
                        <p class="flex items-center font-medium leading-5 text-sm sm:text-base">
                            {{ number_format(get_statistik('jml_wanita'), 0, ',', '.') }}
                            <img src="assets/images/icons/user-square-dark-green.svg"
                                class="flex size-4 sm:size-[18px] shrink-0 ml-0.5" alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">

                    <!-- Head of Family Statistics -->
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex text-sm sm:text-base">
                                <span class="block size-2 rounded-full my-auto bg-desa-orange mr-2"></span>
                                Kepala Keluarga
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Data Kepala Keluarga</p>
                        </div>
                        <p class="flex items-center font-medium leading-5 text-sm sm:text-base">
                            {{ number_format(get_statistik('jml_kepala_keluarga'), 0, ',', '.') }}
                            <img src="assets/images/icons/user-square-dark-green.svg"
                                class="flex size-4 sm:size-[18px] shrink-0 ml-0.5" alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">

                    <!-- Female Head of Family Statistics -->
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex text-sm sm:text-base">
                                <span class="block size-2 rounded-full my-auto bg-desa-yellow mr-2"></span>
                                Kepala Keluarga Perempuan
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Data Kepala Keluarga Perempuan
                            </p>
                        </div>
                        <p class="flex items-center font-medium leading-5 text-sm sm:text-base">
                            {{ number_format(get_statistik('jml_kk'), 0, ',', '.') }}
                            <img src="assets/images/icons/user-square-dark-green.svg"
                                class="flex size-4 sm:size-[18px] shrink-0 ml-0.5" alt="icon">
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal Edit Statistics -->
    <div id="Modal-Edit-Statistik" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden px-4">
        <div id="Alert"
            class="flex flex-col w-full max-w-md max-h-[90vh] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 bg-desa-black">
                <p class="font-medium leading-5 text-white text-sm sm:text-base">Edit Statistik Dashboard</p>
                <button class="btn-close-modal">
                    <img src="assets/images/icons/close-circle-white.svg" class="flex size-5 sm:size-6 shrink-0"
                        alt="icon">
                </button>
            </div>

            <div class="flex flex-col p-4 sm:p-6 gap-4 overflow-y-auto">
                <form class="flex flex-col gap-4" action="{{ route('dashboard.updatestatistik') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Population Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah Penduduk</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="number" placeholder="Ketik Jum Penduduk"
                                        value="{{ get_statistik('jml_penduduk') }}" name="jml_penduduk"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Development Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Pembangunan</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="number" placeholder="Ketik Jum Pembangunan"
                                        value="{{ get_statistik('pembangunan') }}" name="pembangunan"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Houses Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah Rumah</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="number" value="{{ get_statistik('jml_rumah') }}"
                                        placeholder="Ketik Jum Rumah" name="jml_rumah"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-2">
                        <button type="button"
                            class="btn-close-modal flex items-center justify-center h-12 sm:h-14 rounded-2xl py-3 px-6 sm:px-8 gap-2 border border-desa-background hover:bg-desa-black hover:text-white transition-all duration-300 flex-1 order-2 sm:order-1">
                            <span class="font-semibold text-sm">Batal</span>
                        </button>
                        <button
                            class="flex items-center justify-center h-12 sm:h-14 rounded-2xl py-3 px-6 sm:px-8 gap-2 bg-desa-yellow hover:bg-yellow-600 transition-all duration-300 flex-1 order-1 sm:order-2"
                            type="submit">
                            <img src="assets/images/icons/edit-black.svg" class="flex size-5 sm:size-6 shrink-0"
                                alt="">
                            <span class="font-semibold text-sm text-black">Iya Edit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Population -->
    <div id="Modal-Edit-Penduduk" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden px-4">
        <div id="Alert"
            class="flex flex-col w-full max-w-md max-h-[90vh] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 bg-desa-black">
                <p class="font-medium leading-5 text-white text-sm sm:text-base">Edit Penduduk Dashboard</p>
                <button class="btn-close-modal">
                    <img src="assets/images/icons/close-circle-white.svg" class="flex size-5 sm:size-6 shrink-0"
                        alt="icon">
                </button>
            </div>

            <div class="flex flex-col p-4 sm:p-6 gap-4 overflow-y-auto">
                <form class="flex flex-col gap-4" action="{{ route('dashboard.updatependuduk') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Male Population Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah Penduduk Pria
                            </p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Pria" name="jml_pria"
                                        value="{{ get_statistik('jml_pria') }}"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Female Population Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah Penduduk
                                Wanita</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Wanita" name="jml_wanita"
                                        value="{{ get_statistik('jml_wanita') }}"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Head of Family Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah Kepala
                                Keluarga</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Kepala Keluarga"
                                        name="jml_kepala_keluarga" value="{{ get_statistik('jml_kepala_keluarga') }}"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Female Head of Family Input -->
                    <div class="flex flex-col gap-2">
                        <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Jumlah KK P</p>
                            <div class="flex flex-col gap-3 w-full sm:flex-1 sm:max-w-xs">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum KK P" name="jml_kk"
                                        value="{{ get_statistik('jml_kk') }}"
                                        class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 px-10 sm:px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300 text-sm sm:text-base">
                                    <div
                                        class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-full hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-full flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-2">
                        <button type="button"
                            class="btn-close-modal flex items-center justify-center h-12 sm:h-14 rounded-2xl py-3 px-6 sm:px-8 gap-2 border border-desa-background hover:bg-desa-black hover:text-white transition-all duration-300 flex-1 order-2 sm:order-1">
                            <span class="font-semibold text-sm">Batal</span>
                        </button>
                        <button
                            class="flex items-center justify-center h-12 sm:h-14 rounded-2xl py-3 px-6 sm:px-8 gap-2 bg-desa-yellow hover:bg-yellow-600 transition-all duration-300 flex-1 order-1 sm:order-2"
                            type="submit">
                            <img src="assets/images/icons/edit-black.svg" class="flex size-5 sm:size-6 shrink-0"
                                alt="">
                            <span class="font-semibold text-sm text-black">Iya Edit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
