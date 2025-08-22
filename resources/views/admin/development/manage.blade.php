@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col gap-3 p-4 sm:gap-3.5 md:p-6">
        <div id="Header" class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <div class="flex flex-col gap-2">
                <div class="flex flex-wrap items-center gap-1 text-sm leading-5 text-desa-secondary md:text-base">
                    <a href="{{ route('development.index') }}" class="capitalize hover:underline last-of-type:font-semibold last-of-type:text-desa-dark-green">
                        <p>Pembangunan Desa</p>
                    </a>
                    <span>/</span>
                    <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">detail Pembangunan desa</p>
                </div>
                <h1 class="text-2xl font-semibold">Detail Pembangunan Desa</h1>
            </div>
            @auth
                <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center">
                    <button data-modal="Modal-Delete" class="flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-red px-6 py-3 sm:py-4">
                        <p class="font-medium text-white">Hapus Data</p>
                        <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0" alt="icon">
                    </button>
                    <a href="{{ route('development.edit', $dev->id) }}" class="flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-3 sm:py-4">
                        <p class="font-medium text-white">Ubah Data</p>
                        <img src="{{ asset('/assets') }}/images/icons/edit-white.svg" class="flex size-6 shrink-0" alt="icon">
                    </a>
                </div>
            @endauth
        </div>
        <div class="flex flex-col gap-[14px]">
            <section id="Informasi" class="flex flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
                <p class="font-medium leading-5 text-desa-secondary">Informasi Pembangunan</p>
                <div class="flex items-center justify-between">
                    <div class="h-[100px] w-[120px] shrink-0 overflow-hidden rounded-2xl bg-desa-foreshadow">
                        <img src="{{ $dev->thumbnail ? asset('storage/' . $dev->thumbnail) : asset('assets/images/thumbnails/placeholder.png') }}" class="h-full w-full object-cover" alt="photo">
                    </div>
                    <div class="badge flex shrink-0 justify-center gap-2 rounded-full p-3 {{ $dev->status === 'Completed' ? 'bg-desa-green' : 'bg-desa-yellow' }}">
                        <span class="text-xs font-semibold uppercase {{ $dev->status === 'Completed' ? 'text-white' : 'text-black' }}">{{ $dev->status }}</span>
                    </div>
                </div>
                <div class="flex w-full flex-col gap-[6px]">
                    <p class="line-clamp-1 text-lg font-semibold leading-[22.5px]">{{ $dev->nama_projek }}</p>
                    <p class="text-sm font-medium text-desa-secondary">
                        Penanggung Jawab:
                        <span class="text-base font-medium text-desa-dark-green">{{ $dev->giver }}</span>
                    </p>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex w-full items-center gap-3">
                    <div class="flex size-[52px] shrink-0 items-center justify-center rounded-2xl bg-desa-red/10">
                        <img src="{{ asset('/assets') }}/images/icons/wallet-3-red.svg" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex w-full flex-col gap-1">
                        <p class="text-xl font-semibold leading-[22.5px] text-desa-red">{{ $dev->total_dana }}</p>
                        <span class="font-medium text-desa-secondary">Dana Pembangunan</span>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-2xl bg-desa-foreshadow md:size-[52px]">
                            <img src="{{ asset('/assets') }}/images/icons/calendar-2-dark-green.svg" class="size-5 md:size-6" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-semibold leading-snug text-desa-dark-green md:text-lg">
                                {{ $dev->tanggal_pembangunan ? \Carbon\Carbon::parse($dev->tanggal_pembangunan)->translatedFormat('l, d F Y') : '-' }}
                            </p>
                            <span class="text-sm font-medium text-desa-secondary">Tanggal Pelaksanaan</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 md:flex-row-reverse">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-2xl bg-desa-foreshadow md:size-[52px]">
                            <img src="{{ asset('/assets') }}/images/icons/calendar-2-dark-green.svg" class="size-5 md:size-6" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1 text-left md:text-right">
                            <p class="text-base font-semibold leading-snug text-desa-dark-green md:text-lg">
                                {{ $dev->tanggal_pembangunan ? \Carbon\Carbon::parse($dev->tanggal_pembangunan)->addDays($dev->hari)->translatedFormat('l, d F Y') : '-' }}
                            </p>
                            <span class="text-sm font-medium text-desa-secondary">Perkiraan Selesai</span>
                        </div>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="flex w-full items-center gap-3">
                        <div class="flex size-[52px] shrink-0 items-center justify-center rounded-2xl bg-desa-yellow/10">
                            <img src="{{ asset('/assets') }}/images/icons/clock-yellow.svg" class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="text-xl font-semibold leading-[22.5px] text-desa-yellow">{{ $dev->hari }}</p>
                            <span class="font-medium text-desa-secondary">Hari Dibutuhkan</span>
                        </div>
                    </div>
                </div>
                <hr class="border-desa-foreshadow">
                <div class="flex flex-col gap-3">
                    <p class="text-sm font-medium text-desa-secondary">Tentang Pembangunan</p>
                    <p class="font-medium leading-8">{{ $dev->deskripsi }}</p>
                </div>
            </section>
        </div>
    </div>
    <div id="Modal-Delete" class="modal fixed inset-0 z-40 hidden h-screen bg-[#080C1ACC]">
        <div id="Alert" class="m-auto flex w-[335px] shrink-0 flex-col overflow-hidden rounded-2xl bg-white">
            <div class="flex items-center justify-between gap-3 bg-desa-black p-4">
                <p class="font-medium leading-5 text-white">Hapus Pembangunan Desa?</p>
                <button class="btn-close-modal">
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
            </div>
            <div class="flex flex-col gap-3 p-4">
                <p class="text-sm font-medium leading-[22.5px] text-desa-secondary">Tindakan ini permanen dan tidak bisa dibatalkan!</p>
                <hr class="border-desa-background">
                <div class="flex items-center gap-3">
                    <button class="btn-close-modal flex h-14 items-center gap-[10px] rounded-2xl border border-desa-background px-8 py-3 transition-all duration-300 hover:bg-desa-black hover:text-white">
                        <span class="text-sm font-semibold">Batal</span>
                    </button>
                    <form action="{{ route('development.destroy', $dev->id) }}" id="eventDelete" method="POST" class="form-hapus">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex h-14 w-full items-center gap-[10px] rounded-2xl bg-desa-red px-8 py-3">
                            <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0" alt="">
                            <span class="text-sm font-semibold text-white">Iya Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection