@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <a href="{{route('development.index')}}"  class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">

                        <p>Pembangunan Desa</p>
                    </a>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">detail Pembangunan
                        desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Detail Pembangunan Desa</h1>
            </div>
            @auth
            <div class="flex items-center gap-3">
                <button data-modal="Modal-Delete" class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-red">
                    <p class="font-medium text-white">Hapus Data</p>
                    <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
                <a href="{{ route('development.edit') }}"
                class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                <p class="font-medium text-white">Ubah Data</p>
                <img src="{{ asset('/assets') }}/images/icons/edit-white.svg" class="flex size-6 shrink-0" alt="icon">
            </a>
        </div>
        @endauth
        </div>
        <div class="flex flex-col gap-[14px]">
            <section id="Informasi" class="flex flex-col rounded-3xl p-6 gap-6 bg-white">
                <p class="font-medium leading-5 text-desa-secondary">Informasi Pembangunan</p>
                <div class="flex items-center justify-between">
                    <div class="flex w-[120px] h-[100px] shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img src="{{ asset('/assets') }}/images/thumbnails/kk-pembangunan-desa-1.png" class="w-full h-full object-cover"
                            alt="photo">
                    </div>
                    <div class="badge rounded-full p-3 gap-2 flex justify-center shrink-0 bg-desa-yellow">
                        <span class="font-semibold text-xs text-white uppercase">belum dimulai</span>
                    </div>
                </div>
                <div class="flex flex-col gap-[6px] w-full">
                    <p class="font-semibold text-lg leading-[22.5px] line-clamp-1">Pembangunan Jalanan Utama</p>
                    <p class="font-medium text-sm text-desa-secondary">
                        Penanggung Jawab:
                        <span class="font-medium text-base text-desa-dark-green">
                            Uciha Asep
                        </span>
                    </p>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-full gap-3">
                        <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-red/10 items-center justify-center">
                            <img src="{{ asset('/assets') }}/images/icons/wallet-3-red.svg" class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 w-full">
                            <p class="font-semibold text-xl leading-[22.5px] text-desa-red">Rp499.000</p>
                            <span class="font-medium text-desa-secondary">
                                Dana Pembangunan
                            </span>
                        </div>
                    </div>
                    <div class="badge rounded-full p-3 gap-2 flex w-[100px] justify-center shrink-0 bg-desa-dark-green">
                        <span class="font-semibold text-xs text-white uppercase">Tersedia</span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center w-full gap-3">
                        <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="{{ asset('/assets') }}/images/icons/calendar-2-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 w-full">
                            <p class="font-semibold text-xl leading-[22.5px] text-desa-dark-green">Mon, 24 Feb 2025</p>
                            <span class="font-medium text-desa-secondary">
                                Tanggal Pelaksanaan
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-3 justify-end">
                        <div class="flex flex-col gap-1 w-full text-right">
                            <p class="font-semibold text-xl leading-[22.5px] text-desa-dark-green">Wed, 3 Sep 2025</p>
                            <span class="font-medium text-desa-secondary">
                                Perkiraan Selesai
                            </span>
                        </div>
                        <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                            <img src="{{ asset('/assets') }}/images/icons/calendar-2-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center w-full gap-3">
                        <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-yellow/10 items-center justify-center">
                            <img src="{{ asset('/assets') }}/images/icons/clock-yellow.svg" class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 w-full">
                            <p class="font-semibold text-xl leading-[22.5px] text-desa-yellow">12:30 WIB</p>
                            <span class="font-medium text-desa-secondary">
                                Jam Pelaksanaan
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-3 justify-end">
                        <div class="flex flex-col gap-1 w-full text-right">
                            <p class="font-semibold text-xl leading-[22.5px] text-desa-yellow">192 Hari</p>
                            <span class="font-medium text-desa-secondary">
                                Days Needed
                            </span>
                        </div>
                        <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-yellow/10 items-center justify-center">
                            <img src="{{ asset('/assets') }}/images/icons/clock-yellow.svg" class="flex size-6 shrink-0" alt="icon">
                        </div>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-blue/10 items-center justify-center">
                        <img src="{{ asset('/assets') }}/images/icons/profile-2user-blue.svg" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-xl leading-[22.5px] text-desa-blue">9.250 Warga</p>
                        <span class="font-medium text-desa-blue">
                            Total Partisipasi
                        </span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Pembangunan</p>
                    <p class="font-medium leading-8">Pembangunan Jalan Utama adalah langkah strategis untuk meningkatkan
                        aksesibilitas dan mobilitas masyarakat. Proyek ini bertujuan untuk memperbaiki konektivitas
                        antarwilayah, mendukung kegiatan ekonomi lokal, serta menciptakan infrastruktur yang lebih aman dan
                        nyaman bagi pengguna jalan.</p>
                </div>
            </section>
        </div>
    </div>
    <div id="Modal-Delete" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert" class="flex flex-col w-[335px] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 gap-3 bg-desa-black">
                <p class="font-medium leading-5 text-white">Hapus Pembangunan Desa?</p>
                <button class="btn-close-modal">
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
            </div>
            <div class="flex flex-col p-4 gap-3">
                <p class="font-medium text-sm leading-[22.5px] text-desa-secondary">Tindakan ini permanen dan tidak bisa
                    dibatalkan!</p>
                <hr class="border-desa-background">
                <div class="flex items-center gap-3">
                    <button
                        class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                        <span class="font-semibold text-sm">Batal</span>
                    </button>
                    <button class="flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-red w-full">
                        <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0" alt="">
                        <span class="font-semibold text-sm text-white">Iya Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
