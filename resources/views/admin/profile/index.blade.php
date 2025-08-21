@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Profile Desa</h1>
            </div>
            @if (auth()->check())
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                    <p class="font-medium text-white">Ubah Data</p>
                    <img src="{{ asset('assets/') }}/images/icons/edit-white.svg" class="flex size-6 shrink-0"
                        alt="icon">
                </a>
            @endif
        </div>
        <div class="flex gap-[14px]">
            <section id="Nama-Desa"
                class="flex flex-col shrink-0 w-[calc(565/1000*100%)] h-fit rounded-3xl p-6 gap-6 bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary">Profile Desa</p>
                    <img src="{{ asset('assets/') }}/images/icons/building-foreshadow-background.svg"
                        class="flex size-12 shrink-0" alt="icon">
                </div>
                <div id="Nama-Desa" class="flex flex-col gap-[6px]">
                    <h1 class="font-bold text-[32px] leading-10">{{ get_profile('desa_name') }}</h1>
                    <div class="flex items-center gap-0.5">
                        <img src="{{ asset('assets/') }}/images/icons/location-secondary-green.svg"
                            class="flex size-6 shrink-0" alt="icon">
                        <span class="font-medium text-sm text-desa-secondary">Kec. Mempawah Hilir, Kab. Mempawah, Prov.
                            Kalimantan Barat, Indonesia</span>
                    </div>
                </div>
                <div id="Gallery" class="flex flex-col gap-[14px]">
                    <div data-modal="Modal-Gallery" data-gallery="{{ asset('assets/') }}/images/thumbnails/thumbnail.png"
                        id="Thumbnail-Desa"
                        class="flex w-full h-[350px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                        <img src="{{ asset('assets/') }}/images/thumbnails/thumbnail.png" class="w-full h-full object-cover"
                            alt="thumbnail">
                    </div>
                    <div class="grid grid-cols-3 gap-[14px] w-[492px]">
                        @if ($media)
                            @foreach ($media as $index => $m)
                                @if ($index < 2)
                                    <button data-modal="Modal-Gallery" data-description="{{ $m->description }}"
                                        data-gallery="{{ asset('storage/' . $m->file_path) }}" class="relative">
                                        <div
                                            class="thumbnail-selection flex w-full h-[120px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                    </button>
                                @elseif ($index == 2)
                                    <button data-modal="Modal-Gallery" data-description="{{ $m->description }}"
                                        data-gallery="{{ asset('storage/' . $m->file_path) }}" class="relative">
                                        <div
                                            class="thumbnail-selection flex w-full h-[120px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                        @if ($media->count() > 3)
                                            <div
                                                class="absolute inset-0 rounded-3xl overflow-hidden flex flex-col items-center justify-center bg-[#001B1ACC] text-white">
                                                <p class="font-semibold text-xl leading-6">
                                                    +{{ $media->count() - 2 }}
                                                </p>
                                                <p class="font-semibold text-sm text-white">Photo</p>
                                            </div>
                                        @endif
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Desa</p>
                    <p class="font-medium leading-8">{{ get_profile('description') }}</p>
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
                    <p class="font-medium text-sm leading-[28px] text-desa-secondary">{{ get_profile('location') }} </p>
                </div>
            </section>
            <section id="Detail-Desa" class="flex flex-col flex-1 h-fit shrink-0 rounded-3xl p-6 gap-6 bg-white">
                <p class="font-medium leading-5 text-desa-secondary">Detail Desa</p>
                <div class="flex flex-col gap-[14px]">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div class="flex size-[54px] rounded-full bg-desa-foreshadow overflow-hidden">
                            <img src="{{ get_profile('kepala_desa_profil')
                                ? asset('storage/' . get_profile('kepala_desa_profil'))
                                : asset('assets/images/photos/kepalaDesa.jpg') }}"
                                class="w-full h-full object-cover" alt="Foto Kepala Desa">

                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5 text-desa-black">
                                {{ get_profile('kepala_desa_name') }}</p>
                            <p class="flex items-center gap-1">
                                <span class="font-medium text-sm text-desa-secondary">Kepala Desa</span>
                            </p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">
                                {{ number_format(get_statistik('jml_penduduk'), 0, ',', '.') }}</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah Penduduk</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">
                                {{ number_format(get_dusun()->count()), 0, ',', '.' }}</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah Dusun</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">{{ number_format(sum_rw(), 0, ',', '.') }}</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah RW</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/profile-2user-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">{{ number_format(sum_rt(), 0, ',', '.') }}</p>
                            <p class="font-medium text-sm text-desa-secondary">Jumlah RT</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/tree-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">{{ get_profile('luas_petanian') }}m<sup>2</sup></p>
                            <p class="font-medium text-sm text-desa-secondary">Luas Pertanian</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/grid-5-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">{{ get_profile('luas_area') }}m<sup>2</sup></p>
                            <p class="font-medium text-sm text-desa-secondary">Luas Area</p>
                        </div>
                    </div>
                    <hr class="border-desa-background">
                    <div class="flex items-center gap-3 w-[302px] shrink-0">
                        <div
                            class="flex size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                            <img src="{{ asset('assets/') }}/images/icons/calendar-2-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg leading-5">
                                    {{ get_profile('tgl_desa_dibangun') ? \Carbon\Carbon::parse(get_profile('tgl_desa_dibangun'))->format('D, d M Y') : '-' }}
                            </p>
                            <p class="font-medium text-sm text-desa-secondary">Desa Dibangun</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div id="Modal-Gallery" class="modal fixed inset-0 flex flex-col h-screen z-40 hidden bg-[#080C1ACC]">
        <div class="flex flex-col items-center justify-center m-auto">
            <div id="Main-Image-Container" class="flex aspect-[805/492] w-full max-w-[805px] overflow-hidden mx-auto">
                <img id="Selected-Image" src="{{ asset('assets/') }}/images/thumbnails/thumbnail.png"
                    class="size-full object-contain object-center" alt="thumbnail">
            </div>
            <button
                class="btn-close-modal flex items-center rounded-full border border-white/10 py-3 px-4 mx-auto mt-[30px]">
                <img src="assets/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                <p class="font-medium leading-5 text-white">Tutup</p>
            </button>
            <p id="description" class="font-semibold text-lg mt-4 leading-5 text-white">Deskripsi</p>
        </div>
        <div class="flex flex-wrap items-center w-full border border-white/10 gap-4 p-4">
            @if ($media)
                @foreach ($media as $m)
                    <button data-image="{{ asset('storage/' . $m->file_path) }}"
                        data-description="{{ $m->description }}"
                        class="group relative flex w-[140px] h-[120px] shrink-0 rounded-3xl bg-desa-background overflow-hidden active">
                        <img src="{{ asset('storage/' . $m->file_path) }}"
                            class="size-full object-cover group-[.active]:blur" alt="thumbnail">
                        <img src="assets/images/icons/eye-white-fill.svg"
                            class="absolute hidden size-9 shrink-0 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 group-[.active]:flex"
                            alt="icon">

                    </button>
                @endforeach
            @endif
        </div>
    </div>
@endsection
