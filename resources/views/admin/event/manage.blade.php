@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Events desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Detail Event Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Detail Event Desa</h1>
            </div>
            <a href="{{ route('event.edit') }}" class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                <p class="font-medium text-white">Ubah Data</p>
                <img src="{{ asset('/assets') }}/images/icons/edit-white.svg" class="flex size-6 shrink-0" alt="icon">
            </a>
        </div>
        <div class="flex gap-[14px]">
            <section id="Informasi"
                class="flex flex-col shrink-0 w-full h-fit rounded-3xl p-6 gap-6 bg-white">
                <p class="font-medium leading-5 text-desa-secondary">Informasi Event</p>
                <div class="flex items-center w-full">
                    <div class="flex w-[100px] h-20 shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img src="{{ asset('/assets') }}/images/thumbnails/kk-event-desa-1.png" class="w-full h-full object-cover"
                            alt="photo">
                    </div>
                    <div class="flex flex-col gap-[6px] w-full ml-4 mr-9">
                        <p class="font-semibold text-lg leading-[22.5px] line-clamp-1">Belajar HTML Dasar Bersama</p>
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('/assets') }}/images/icons/ticket-secondary-green.svg" class="flex size-[18px] shrink-0"
                                alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                Registration:
                                <span class="font-medium text-base text-desa-dark-green">
                                    Open
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-red/10 items-center justify-center">
                        <img src="{{ asset('/assets') }}/images/icons/ticket-2-red.svg" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-red">Rp499.000</p>
                        <span class="font-medium text-desa-secondary">
                            Harga Event
                        </span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-blue/10 items-center justify-center">
                        <img src="{{ asset('/assets') }}/images/icons/profile-2user-blue.svg" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-blue">15.600 Warga</p>
                        <span class="font-medium text-desa-secondary">
                            Total Partisipasi
                        </span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                        <img src="{{ asset('/assets') }}/images/icons/calendar-2-dark-green.svg" class="flex size-6 shrink-0"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-dark-green">Mon, 24 Feb 2025</p>
                        <span class="font-medium text-desa-secondary">
                            Tanggal Pelaksaaan
                        </span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-yellow/10 items-center justify-center">
                        <img src="{{ asset('/assets') }}/images/icons/clock-yellow.svg" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-yellow">12:30 WIB</p>
                        <span class="font-medium text-desa-secondary">
                            Tanggal Pelaksaaan
                        </span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Event</p>
                    <p class="font-medium leading-8">
                        Belajar Teknologi untuk Masa Depan!Kepala desa mengundang seluruh warga untuk mengikuti acara
                        Belajar HTML Dasar Bersama. Dalam acara ini, kita akan:
                        <br>- Mengenal dasar-dasar HTML sebagai langkah awal membuat website.
                        <br>- Belajar struktur sederhana halaman web.
                        <br>- Mencoba langsung membuat halaman web bersama
                        <br>Mulailah perjalanan Anda untuk memahami elemen-elemen penting HTML, praktik langsung, dan
                        temukan bagaimana teknologi ini membuka peluang baru. Jangan lupa untuk terus berlatih agar semakin
                        mahir!
                    </p>
                </div>
            </section>
        </div>
    </div>
@endsection
