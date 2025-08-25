@extends('admin.layouts.app')
@section('content')
    <div class="gap-3 sm:gap-3.5 flex flex-col px-2 sm:px-4">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div class="gap-1 lg:gap-2 flex flex-col">
                <h1 class="text-lg sm:text-xl lg:text-2xl text-black font-semibold">Profile Desa</h1>
            </div>
            @if (auth()->check())
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center rounded-2xl py-2 sm:py-3 px-3 sm:px-4 gap-2 sm:gap-[10px] bg-desa-black w-full sm:w-auto justify-center">
                    <p class="font-medium text-white text-sm sm:text-base">Ubah Data</p>
                    <img src="{{ asset('assets/') }}/images/icons/edit-white.svg" class="flex size-5 sm:size-6 shrink-0"
                        alt="icon">
                </a>
            @endif
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">

            <!-- Village Profile Section -->
            <section id="Nama-Desa"
                class="flex flex-col rounded-2xl sm:rounded-3xl p-4 sm:p-6 gap-4 sm:gap-6 bg-white w-full">

                <!-- Profile Header -->
                <div class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Profile Desa</p>
                    <img src="{{ asset('assets/') }}/images/icons/building-foreshadow-background.svg"
                        class="flex size-10 sm:size-12 shrink-0" alt="icon">
                </div>

                <!-- Village Name and Location -->
                <div id="Nama-Desa" class="flex flex-col gap-1 sm:gap-[6px]">
                    <h1 class="font-bold text-2xl sm:text-[32px] leading-8 sm:leading-10">{{ get_profile('desa_name') }}
                    </h1>
                    <div class="flex items-start sm:items-center gap-1 sm:gap-0.5">
                        <img src="{{ asset('assets/') }}/images/icons/location-secondary-green.svg"
                            class="flex size-5 sm:size-6 shrink-0 mt-0.5 sm:mt-0" alt="icon">
                        <span class="font-medium text-xs sm:text-sm text-desa-secondary leading-5 sm:leading-normal">
                            Kec. Mempawah Hilir, Kab. Mempawah, Prov. Kalimantan Barat, Indonesia
                        </span>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div id="Gallery" class="flex flex-col gap-3 sm:gap-[14px]">
                    <!-- Main Thumbnail -->
                    <div data-modal="Modal-Gallery" data-gallery="{{ asset('assets/') }}/images/thumbnails/thumbnail.png"
                        id="Thumbnail-Desa"
                        class="flex w-full h-48 sm:h-64 lg:h-auto shrink-0 rounded-2xl sm:rounded-3xl bg-desa-background overflow-hidden cursor-pointer">
                        <img src="{{ asset('assets/') }}/images/thumbnails/thumbnail.png"
                            class="w-full h-full object-cover sm:object-contain" alt="thumbnail">
                    </div>

                    <!-- Gallery Thumbnails -->
                    <div class="grid grid-cols-3 gap-2 sm:gap-[14px] max-w-full">
                        @if ($media)
                            @foreach ($media as $index => $m)
                                @if ($index < 2)
                                    <button data-modal="Modal-Gallery" data-description="{{ $m->description }}"
                                        data-gallery="{{ asset('storage/' . $m->file_path) }}" class="relative">
                                        <div
                                            class="thumbnail-selection flex w-full h-20 sm:h-[120px] shrink-0 rounded-2xl sm:rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                    </button>
                                @elseif ($index == 2)
                                    <button data-modal="Modal-Gallery" data-description="{{ $m->description }}"
                                        data-gallery="{{ asset('storage/' . $m->file_path) }}" class="relative">
                                        <div
                                            class="thumbnail-selection flex w-full h-20 sm:h-[120px] shrink-0 rounded-2xl sm:rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                        @if ($media->count() > 3)
                                            <div
                                                class="absolute inset-0 rounded-2xl sm:rounded-3xl overflow-hidden flex flex-col items-center justify-center bg-[#001B1ACC] text-white">
                                                <p class="font-semibold text-lg sm:text-xl leading-5 sm:leading-6">
                                                    +{{ $media->count() - 2 }}
                                                </p>
                                                <p class="font-semibold text-xs sm:text-sm text-white">Photo</p>
                                            </div>
                                        @endif
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- About Village Section -->
                <div class="flex flex-col gap-2 sm:gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Desa</p>
                    <p class="font-medium text-sm sm:text-base leading-6 sm:leading-8">{{ get_profile('description') }}</p>
                </div>

                <!-- Village Map Section -->
                <div class="flex flex-col gap-2 sm:gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Peta Desa</p>
                    <div class="rounded-2xl overflow-hidden max-w-full w-full h-64 sm:h-80 lg:h-[350px]">
                        <div id="embedded-map-display" class="size-full max-w-full">
                            <iframe class="size-full border-0" frameborder="0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57767.704788773306!2d108.98758156228199!3d0.4183117006526604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e2e56e9f2a59cd%3A0x86961de9c721ec60!2sPenibung%2C%20Kec.%20Mempawah%20Hilir%2C%20Kab.%20Mempawah%2C%20Kalimantan%20Barat!5e1!3m2!1sid!2sid!4v1754885731995!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <p class="font-medium text-xs sm:text-sm leading-6 sm:leading-[28px] text-desa-secondary">
                        {{ get_profile('location') }}</p>
                </div>
            </section>

            <!-- Village Details Section -->
            <section id="Detail-Desa"
                class="flex flex-col rounded-2xl sm:rounded-3xl p-4 sm:p-6 gap-4 sm:gap-6 bg-white w-full">
                <p class="font-medium leading-5 text-desa-secondary text-sm sm:text-base">Detail Desa</p>

                <div class="flex flex-col gap-3 sm:gap-[14px]">
                    <!-- Village Head -->
                    <div class="flex items-center gap-3 w-full">
                        <div class="flex size-12 sm:size-[54px] rounded-full bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ get_profile('kepala_desa_profil')
                                ? asset('storage/' . get_profile('kepala_desa_profil'))
                                : asset('assets/images/photos/kepalaDesa.jpg') }}"
                                class="w-full h-full object-cover" alt="Foto Kepala Desa">
                        </div>
                        <div class="flex flex-col gap-1 flex-1 min-w-0">
                            <p class="font-semibold text-base sm:text-lg leading-5 text-desa-black truncate">
                                {{ get_profile('kepala_desa_name') }}
                            </p>
                            <p class="flex items-center gap-1">
                                <span class="font-medium text-xs sm:text-sm text-desa-secondary">Kepala Desa</span>
                            </p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- Population Count -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ number_format(get_statistik('jml_penduduk'), 0, ',', '.') }}
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Jumlah Penduduk</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- Hamlet Count -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ number_format(get_dusun()->count(), 0, ',', '.') }}
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Jumlah Dusun</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- RW Count -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ number_format(sum_rw(), 0, ',', '.') }}
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Jumlah RW</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- RT Count -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ number_format(sum_rt(), 0, ',', '.') }}
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Jumlah RT</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- Agricultural Area -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/tree-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ get_profile('luas_petanian') }}m<sup>2</sup>
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Luas Pertanian</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- Total Area -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/grid-5-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ get_profile('luas_area') }}m<sup>2</sup>
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Luas Area</p>
                        </div>
                    </div>

                    <hr class="border-desa-background">

                    <!-- Village Establishment Date -->
                    <div class="flex items-center gap-3 w-full">
                        <div
                            class="flex size-12 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/calendar-2-dark-green.svg"
                                class="flex size-5 sm:size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 flex-1">
                            <p class="font-semibold text-base sm:text-lg leading-5">
                                {{ get_profile('tgl_desa_dibangun') ? \Carbon\Carbon::parse(get_profile('tgl_desa_dibangun'))->format('D, d M Y') : '-' }}
                            </p>
                            <p class="font-medium text-xs sm:text-sm text-desa-secondary">Desa Dibangun</p>
                        </div>
                    </div>
                    <!-- Struktur Organisasi -->
                    <div class="flex flex-col items-center gap-3 mt-6">
                        <h3 class="text-lg sm:text-xl font-semibold text-desa-black text-center">
                            Struktur Organisasi Pemerintah Desa
                        </h3>
                        <img src="{{ asset('assets/images/thumbnails/StrukturDesaPenibung.png') }}"
                            alt="Struktur Organisasi Pemerintah Desa"
                            class="w-full max-w-4xl rounded-2xl border border-desa-background shadow-md object-contain">

                        <p class="text-center text-sm sm:text-base text-desa-secondary mt-2">
                            Desa Penibung, Kecamatan Mempawah Hilir, Kabupaten Mempawah <br>
                            Kepmendagri Nomor 84 tahun 2015
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div id="Modal-Gallery" class="modal fixed inset-0 flex flex-col h-screen z-40 hidden bg-[#080C1ACC] p-4">
        <div class="flex flex-col items-center justify-center m-auto max-w-full">
            <!-- Main Image Container -->
            <div id="Main-Image-Container"
                class="flex aspect-[4/3] sm:aspect-[805/492] w-full max-w-[805px] overflow-hidden mx-auto">
                <img id="Selected-Image" src="{{ asset('assets/') }}/images/thumbnails/thumbnail.png"
                    class="size-full object-contain object-center" alt="thumbnail">
            </div>

            <!-- Close Button -->
            <button
                class="btn-close-modal flex items-center rounded-full border border-white/10 py-2 sm:py-3 px-3 sm:px-4 mx-auto mt-4 sm:mt-[30px] gap-2">
                <img src="assets/images/icons/close-circle-white.svg" class="flex size-5 sm:size-6 shrink-0"
                    alt="icon">
                <p class="font-medium leading-5 text-white text-sm sm:text-base">Tutup</p>
            </button>

            <!-- Description -->
            <p id="description"
                class="font-semibold text-base sm:text-lg mt-3 sm:mt-4 leading-5 text-white text-center px-4">Deskripsi</p>
        </div>

        <!-- Thumbnail Gallery -->
        <div class="flex flex-wrap items-center w-full border border-white/10 gap-2 sm:gap-4 p-2 sm:p-4 overflow-x-auto">
            @if ($media)
                @foreach ($media as $m)
                    <button data-image="{{ asset('storage/' . $m->file_path) }}"
                        data-description="{{ $m->description }}"
                        class="group relative flex w-24 sm:w-[140px] h-20 sm:h-[120px] shrink-0 rounded-2xl sm:rounded-3xl bg-desa-background overflow-hidden active">
                        <img src="{{ asset('storage/' . $m->file_path) }}"
                            class="size-full object-cover group-[.active]:blur" alt="thumbnail">
                        <img src="assets/images/icons/eye-white-fill.svg"
                            class="absolute hidden size-6 sm:size-9 shrink-0 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 group-[.active]:flex"
                            alt="icon">
                    </button>
                @endforeach
            @endif
        </div>
    </div>
@endsection
