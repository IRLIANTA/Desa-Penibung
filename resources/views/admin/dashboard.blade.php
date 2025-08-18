@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-[14px] p-6 pb-[30px] w-full shrink-0">

        <h1 class="font-semibold text-2xl">Desa Statistics</h1>
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
                        <p class="font-semibold text-[32px] leading-10">243.000</p>
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
                        <p class="font-semibold text-[32px] leading-10">42.000</p>
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
                        <p class="font-medium text-desa-secondary">Kepala Rumah</p>
                        <img src="assets/images/icons/crown-foreshadow-background.svg" class="flex size-12 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <p class="font-semibold text-[32px] leading-10">9.250</p>
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
        <div id="Row-2" class="flex gap-[14px]">

            <section id="Bantuan-Sosial" class="flex flex-col w-[calc(497/1000*100%)] shrink-0 rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-6">
                    <p class="font-semibold text-[20px] leading-[25px] text-left w-full">Infografis Desa</p>
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">3</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg" class="flex size-[18px] shrink-0"
                                    alt="icon">
                                <span class="line-clamp-1">
                                    jumlah dusun
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>
                    </div>
                    <hr class="border-desa-foreshadow last-of-type:hidden">
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">8</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">
                                    Jumlah Rukun Warga
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>

                    </div>
                    <hr class="border-desa-foreshadow last-of-type:hidden">
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">16 </p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">
                                    Jumlah Rukun Tetangga
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>
                    </div>
                </div>
            </section>
            <section id="Bantuan-Sosial" class="flex flex-col w-[calc(497/1000*100%)] shrink-0 rounded-2xl bg-white">
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-4 p-6">
                    <p class="font-semibold text-[20px] leading-[25px] text-left w-full">Informasi Dusun</p>
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">Dusun Renjuang</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg" class="flex size-[18px] shrink-0"
                                    alt="icon">
                                <span class="line-clamp-1">
                                    Kepala Dusun Roni
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>
                    </div>
                    <hr class="border-desa-foreshadow last-of-type:hidden">
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">Dusun Dewa</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">
                                    Kepala Dusun Suharmanik
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>

                    </div>
                    <hr class="border-desa-foreshadow last-of-type:hidden">
                    <div class="card flex items-center w-full gap-3">
                        <div class="flex size-[72px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="assets/images/icons/money-dark-green.svg" class="flex size-9 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full">
                            <p class="font-semibold text-xl leading-[25px]">Dusun Melayu</p>
                            <div class="flex items-center gap-0.5 font-medium text-desa-secondary">
                                <img src="assets/images/icons/profile-secondary-green.svg"
                                    class="flex size-[18px] shrink-0" alt="icon">
                                <span class="line-clamp-1">
                                    Kepala Dusun Siska
                                </span>
                            </div>
                        </div>
                        <button type="button"
                            class="rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-yellow hover:bg-yellow-600 transition">
                            <span class="font-semibold text-xs text-white uppercase">Edit</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
        <div id="Row-3" class="flex gap-[14px]">
            <section id="statistik-Penduduk" class="flex flex-col flex-1 shrink-0 gap-4 p-6 rounded-2xl bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-medium text-desa-secondary">Statistics Penduduk</p>
                    <img src="assets/images/icons/profile-2user-foreshadow-background.svg" class="flex size-12 shrink-0"
                        alt="icon">
                </div>
                <div class="relative">
                    <div class="absolute flex flex-col gap-1 justify-center items-center text-center inset-0">
                        <p class="font-semibold text-[32px] leading-10">243.000</p>
                        <p class="font-medium text-sm text-desa-secondary">Jumlah Penduduk</p>
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
                                Anak-anak
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Rentang usia: 6-12 tahun</p>
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
                                Balita
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Rentang usia: 0-5 tahun</p>
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
@endsection
