@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-[14px] p-6 pb-[30px] w-full shrink-0">

        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Statistik Desa</h1>
            </div>

            @if (auth()->check())
            <button data-modal="Modal-Edit-Statistik"
                class="flex items-center rounded-2xl py-3 px-4 gap-[10px] bg-desa-yellow">
                <p class="font-medium text-black">Ubah Statistik</p>
                <img src="assets/images/icons/edit-black.svg" class="flex size-6 shrink-0" alt="icon">
            </button>
            @endif

        </div>
        <div id="Row-1" class="flex gap-[14px]">
            <div class="flex flex-col w-[calc(389/1000*100%)] h-[358px] rounded-2xl p-6 gap-6 gradient-vertical">
                <img src="assets/images/icons/gift-orange-background.svg" class="flex size-[86px] shrink-0" alt="icon">
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-lime">— Bantuan Sosial</p>
                    <p class="font-semibold text-2xl text-white text-nowrap">Dari Desa untuk Warga ❤️ </p>
                    <p class="text-white">Wujudkan kesejahteraan desa dengan bantuan sosial yang tepat sasaran.</p>
                </div>
                <a href="#" class="flex items-center justify-between rounded-2xl p-4 gap-[10px] bg-white">
                    <span class="font-medium text-desa-dark-green leading-5">Bikin Bantuan Sosial</span>
                    <img src="assets/images/icons/add-square-dark-green.svg" class="flex size-6 shrink-0" alt="icon">
                </a>
            </div>
            <section id="Statistics" class="grid grid-cols-2 flex-1 shrink-0 gap-[14px]">
                <div class="card flex flex-col w-full rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah Penduduk</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg" class="flex size-12 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_penduduk'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card flex flex-col w-full rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Pembangunan</p>
                        <img src="assets/images/icons/buildings-foreshadow-background.svg" class="flex size-12 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('pembangunan'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card flex flex-col w-full rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah Rumah</p>
                        <img src="assets/images/icons/crown-foreshadow-background.svg" class="flex size-12 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_rumah'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card flex flex-col w-full rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Total Events</p>
                        <img src="assets/images/icons/calendar-2-foreshadow-background.svg" class="flex size-12 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">12</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span>
                                dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @if (auth()->check())
        <div id="Header" class="flex">
            <button data-modal="Modal-Edit-Penduduk"
                class="flex items-center  rounded-2xl py-3 px-4 gap-[10px] bg-desa-yellow">
                <p class="font-medium text-black">Ubah Penduduk</p>
                <img src="assets/images/icons/edit-black.svg" class="flex size-6 shrink-0" alt="icon">
            </button>
        </div>
        @endif

        <div id="Row-2" class="flex gap-[14px]">
            <section id="Statistics" class="grid grid-cols-4 gap-[14px] w-full">
                <!-- Card 1 -->
                <div class="card flex flex-col rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah Penduduk Pria</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_pria'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card flex flex-col rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah Penduduk Perempuan</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_pria'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card flex flex-col rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah Kepala Keluarga</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_kepala_keluarga'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card flex flex-col rounded-2xl p-6 gap-3 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-desa-secondary">Jumlah KK P</p>
                        <img src="assets/images/icons/profil-2user-foreshadow-background.svg"
                            class="flex size-12 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">
                            {{ number_format(get_statistik('jml_kk'), 0, ',', '.') }}</p>
                        <div class="flex items-center gap-0.5">
                            <img src="assets/images/icons/trend-up-dark-green-fill.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                <span class="text-desa-dark-green">+12%</span> dari bulan sebelumnya
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="Row-4" class="flex gap-[14px]">
            <section id="Bantuan-Sosial" class="flex flex-col w-[calc(497/1000*100%)] shrink-0 rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-6">
                    <!-- Header + Tombol Edit -->
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-[20px] leading-[25px]">Infografis Desa</p>

                    </div>

                    <!-- Card 1 -->
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">{{number_format(get_dusun()->count()), 0, ',', '.'}}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">Jumlah Dusun</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-desa-foreshadow last-of-type:hidden">

                    <!-- Card 2 -->
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">{{ number_format(sum_rw(), 0, ',', '.') }}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">Jumlah Rukun Warga</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-desa-foreshadow last-of-type:hidden">

                    <!-- Card 3 -->
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">{{ number_format(sum_rt(), 0, ',', '.') }}</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">Jumlah Rukun Tetangga</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Bantuan-Sosial" class="flex flex-col w-[calc(497/1000*100%)] shrink-0 rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-6">
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-[20px] leading-[25px]">Informasi Dusun</p>

                        @if (auth()->check())
                        <a href="{{ route('dashboard.editdusun') }}"
                            class="w-[100px] rounded-full p-3 flex items-center justify-center bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-black uppercase">Edit</span>
                        </a>
                        @endif

                    </div>
                    @forelse ($dusun as $d)
                        <div class="card flex items-center w-full gap-3">
                            <div
                                class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                                <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                    alt="icon">
                            </div>
                            <div class="flex flex-col gap-[6px] w-full">
                                <p class="font-semibold text-xl leading-[25px]">{{$d->dusun}}</p>
                                <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                    <img src="assets/images/icons/profile-secondary-green.svg"
                                        class="flex size-[18px] shrink-0" alt="icon">
                                    <span class="line-clamp-1">{{$d->nama_kepala_dusun}}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card flex items-center text-center w-full gap-3">
                            <div class="flex flex-col gap-[6px] w-full">
                                <p class="font-semibold text-desa-secondary text-xl leading-[25px]">Tidak ada dusun
                                    tersedia</p>
                            </div>
                        </div>
                    @endforelse
                    <hr class="border-desa-foreshadow last-of-type:hidden">
                </div>
            </section>

        </div>
        <div id="Row-3" class="flex gap-[14px]">
            <section id="statistik-Penduduk" class="flex flex-col flex-1 shrink-0 gap-4 p-6 rounded-2xl bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-medium text-desa-secondary">Statistics Desa</p>
                    <img src="assets/images/icons/profile-2user-foreshadow-background.svg" class="flex size-12 shrink-0"
                        alt="icon">
                </div>
                <div class="relative">
                    <div class="absolute flex flex-col gap-1 justify-center items-center text-center inset-0">
                        <p class="font-semibold text-[32px] leading-10">243.000</p>
                        <p class="font-medium text-sm text-desa-secondary">Statistics Desa</p>
                    </div>
                    <canvas id="myChart" class="size-[288px] mx-auto"></canvas>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex">
                                <span class="block size-2 rounded-full my-auto bg-desa-dark-green mr-[6px]"></span>
                                Pria
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Rentang usia: 32-36 tahun</p>
                        </div>
                        <p class="flex items-center font-medium leading-5">
                            114.210
                            <img src="assets/images/icons/user-black.svg" class="flex size-[18px] shrink-0 ml-0.5"
                                alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex">
                                <span class="block size-2 rounded-full my-auto bg-desa-soft-green mr-[6px]"></span>
                                Wanita
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Rentang usia: 26-31 tahun</p>
                        </div>
                        <p class="flex items-center font-medium leading-5">
                            97.200
                            <img src="assets/images/icons/user-black.svg" class="flex size-[18px] shrink-0 ml-0.5"
                                alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex">
                                <span class="block size-2 rounded-full my-auto bg-desa-orange mr-[6px]"></span>
                                Pembangunan
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Data Pembangunan</p>
                        </div>
                        <p class="flex items-center font-medium leading-5">
                            24.300
                            <img src="assets/images/icons/user-black.svg" class="flex size-[18px] shrink-0 ml-0.5"
                                alt="icon">
                        </p>
                    </div>
                    <hr class="border-desa-foreshadow">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <p class="font-medium leading-5 flex">
                                <span class="block size-2 rounded-full my-auto bg-desa-yellow mr-[6px]"></span>
                                Dusun
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Data Dusun</p>
                        </div>
                        <p class="flex items-center font-medium leading-5">
                            7.290
                            <img src="assets/images/icons/user-black.svg" class="flex size-[18px] shrink-0 ml-0.5"
                                alt="icon">
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="Modal-Edit-Statistik" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert"
            class="flex flex-col w-fit max-w-md max-h-[90vh] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">

            <div class="flex items-center justify-between p-4 bg-desa-black">
                <p class="font-medium leading-5 text-white">Edit Statistik Dashboard</p>
                <button class="btn-close-modal">
                    <img src="assets/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
            </div>

            <div class="flex flex-col p-6 gap-4 overflow-y-auto">
                <form class="flex flex-col gap-4" action="{{ route('dashboard.updatestatistik') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Penduduk</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="number" placeholder="Ketik Jum Penduduk"
                                        value="{{ get_statistik('jml_penduduk') }}" name="jml_penduduk"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pembangunan</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="number" placeholder="Ketik Jum Pembangunan"
                                        value="{{ get_statistik('pembangunan') }}" name="pembangunan"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Rumah</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="number" value="{{ get_statistik('jml_rumah') }}"
                                        placeholder="Ketik Jum Rumah" name="jml_rumah"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex gap-3" style="justify-content: right;">
                        <button
                            class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                            <span class="font-semibold text-sm">Batal</span>
                        </button>
                        <button class="flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-yellow w-fit"
                            type="submit">
                            <img src="assets/images/icons/edit-black.svg" class="flex size-6 shrink-0" alt="">
                            <span class="font-semibold text-sm text-black">Iya Edit</span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Footer -->
        </div>
    </div>
    {{-- modal edit penduduk --}}
    <div id="Modal-Edit-Penduduk" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert"
            class="flex flex-col w-fit max-w-md max-h-[90vh] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">

            <div class="flex items-center justify-between p-4 bg-desa-black">
                <p class="font-medium leading-5 text-white">Edit Penduduk Dashboard</p>
                <button class="btn-close-modal">
                    <img src="assets/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
            </div>

            <div class="flex flex-col p-6 gap-4 overflow-y-auto">
                <form class="flex flex-col gap-4" action="{{ route('dashboard.updatependuduk') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Penduduk
                                Pria</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Pria" name="jml_pria"
                                        value="{{ get_statistik('jml_pria') }}"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Penduduk
                                Wanita</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Wanita" name="jml_wanita"
                                        value="{{ get_statistik('jml_wanita') }}"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Kepala
                                Keluarga</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum Kepala Keluarga"
                                        name="jml_kepala_keluarga" value="{{ get_statistik('jml_kepala_keluarga') }}"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>
                    <div class="flex flex-col gap-2">
                        <section id="Nama-Projek" class="flex items-center justify-between">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah KK P</p>
                            <div class="flex flex-col gap-3 flex-1 shrink-0">
                                <label class="relative group peer w-full">
                                    <input type="text" placeholder="Ketik Jum KK P" name="jml_kk"
                                        value="{{ get_statistik('jml_kk') }}"
                                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                        <img src="assets/images/icons/edit-secondary-green.svg"
                                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                        <img src="assets/images/icons/edit-black.svg"
                                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                    </div>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="flex gap-3" style="justify-content: right;">
                        <button
                            class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                            <span class="font-semibold text-sm">Batal</span>
                        </button>
                        <button class="flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-yellow w-fit"
                            type="submit">
                            <img src="assets/images/icons/edit-black.svg" class="flex size-6 shrink-0" alt="">
                            <span class="font-semibold text-sm text-black">Iya Edit</span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Footer -->
        </div>
    </div>
@endsection
