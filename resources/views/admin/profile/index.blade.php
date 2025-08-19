@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Profile Desa</h1>
            </div>
            @if(auth()->check())
            <a href="{{ route('profile.edit') }}" class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                <p class="font-medium text-white">Ubah Data</p>
                <img src="assets/images/icons/edit-white.svg" class="flex size-6 shrink-0" alt="icon">
            </a>
            @endif
        </div>
        <div class="flex gap-[14px]">
            <section id="Nama-Desa"
                class="flex flex-col shrink-0 w-[calc(565/1000*100%)] h-fit rounded-3xl p-6 gap-6 bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary">Profile Desa</p>
                    <img src="assets/images/icons/building-foreshadow-background.svg" class="flex size-12 shrink-0"
                        alt="icon">
                </div>
                <div id="Nama-Desa" class="flex flex-col gap-[6px]">
                    <h1 class="font-bold text-[32px] leading-10">Desa Penibung</h1>
                    <div class="flex items-center gap-0.5">
                        <img src="assets/images/icons/location-secondary-green.svg" class="flex size-6 shrink-0"
                            alt="icon">
                        <span class="font-medium text-sm text-desa-secondary">Kec. Mempawah Hilir, Kab. Mempawah, Prov.
                            Kalimantan Barat, Indonesia</span>
                    </div>
                </div>
                <div id="Gallery" class="flex flex-col gap-[14px]">
                    <div data-modal="Modal-Gallery" data-gallery="assets/images/thumbnails/desa-gallery-1.png"
                        id="Thumbnail-Desa"
                        class="flex w-full h-[350px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                        <img src="{{ asset('assets/') }}/images/thumbnails/thumbnail.png" class="w-full h-full object-cover"
                            alt="thumbnail">
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Desa</p>
                    <p class="font-medium leading-8">Desa Angga Countryside terletak di kaki gunung 🏔️ dengan
                        udara sejuk dan pemandangan sawah yang hijau 🌿. Warganya ramah dan masih menjaga
                        tradisi gotong-royong. Penghasilan utama desa ini adalah padi 🍚, kopi ☕, dan kerajinan
                        anyaman bambu 🎋. Desa ini juga memiliki wisata alam seperti air terjun kecil 💧 dan
                        jalur tracking.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Peta Desa</p>
                    <div class="rounded-2xl overflow-hidden max-w-full w-full !h-[350px]">
                        <div id="embedded-map-display" class="size-full max-w-full">
                            <iframe class="size-full border-0" frameborder="0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57767.704788773306!2d108.98758156228199!3d0.4183117006526604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e2e56e9f2a59cd%3A0x86961de9c721ec60!2sPenibung%2C%20Kec.%20Mempawah%20Hilir%2C%20Kab.%20Mempawah%2C%20Kalimantan%20Barat!5e1!3m2!1sid!2sid!4v1754885731995!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>
                    <p class="font-medium text-sm leading-[28px] text-desa-secondary"> Jl. Raya Penibung, Desa Penibung,
                        Kecamatan Mempawah Hilir, Kabupaten Mempawah, Provinsi Kalimantan Barat, Indonesia —
                        Kode Pos 78919</p>
                </div>
            </section>
            <section id="Detail-Desa" class="flex flex-col flex-1 h-fit shrink-0 rounded-3xl p-6 gap-6 bg-white">
                <p class="font-medium leading-5 text-desa-secondary">Detail Desa</p>
                <div class="flex flex-col gap-[14px]">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div class="flex size-[54px] rounded-full bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/photos/kepalaDesa.jpg"
                                class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5 text-desa-black">Evi Junita S.Pd.I</p>
                            <p class="flex items-center gap-1">
                                <span class="font-medium text-sm text-desa-secondary">Kepala Desa</span>
                            </p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/profile-2user-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">243.000</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah Penduduk</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/profile-2user-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">3</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah Dusun</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/profile-2user-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">8</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah RW</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/profile-2user-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">16</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah RT</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/tree-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">25.200m<sup>2</sup></p>
                            <p class="font-medium text-sm text-desa-secondary">Luas Pertanian</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/grid-5-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">9.222.500m<sup>2</sup></p>
                            <p class="font-medium text-sm text-desa-secondary">Luas Area</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="assets/images/icons/calendar-2-dark-green.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">Mon, 24 Feb 2012</p>
                            <p class="font-medium text-sm text-desa-secondary">Desa Dibangun</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
