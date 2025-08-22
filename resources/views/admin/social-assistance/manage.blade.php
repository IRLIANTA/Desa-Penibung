@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col gap-3 p-4 sm:gap-3.5 md:p-6">
        <div id="Header" class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <div class="flex flex-col gap-2">
                <div class="flex flex-wrap items-center gap-1 text-sm leading-5 text-desa-secondary md:text-base">
                    <a href="{{ route('social-assistance.index') }}" class="capitalize hover:underline last-of-type:font-semibold last-of-type:text-desa-dark-green">
                        <p>Bantuan sosial</p>
                    </a>
                    <span>/</span>
                    <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Manage bantuan sosial</p>
                </div>
                <h1 class="text-2xl font-semibold">Manage Bantuan Sosial</h1>
            </div>
            @if (auth()->check())
                <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center">
    
                        <button type="button" data-modal="Modal-Delete"  class="flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-red px-6 py-3 sm:py-4">
                            <p class="font-medium text-white">Hapus</p>
                            <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0" alt="icon">
                        </button>
                    <a href="{{ route('social-assistance.edit', $socialAssistance->id) }}" class="flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-3 sm:py-4">
                        <p class="font-medium text-white">Ubah</p>
                        <img src="{{ asset('/assets') }}/images/icons/edit-white.svg" class="flex size-6 shrink-0" alt="icon">
                    </a>
                </div>
            @endif
        </div>

        <section id="Informasi-Bantuan-Sosial" class="flex h-fit w-full flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
            <p class="font-medium leading-5 text-desa-secondary">Informasi Bantuan Sosial</p>
            <div class="flex items-center justify-between gap-4">
                <div class="h-[100px] w-[120px] shrink-0 overflow-hidden rounded-2xl bg-desa-foreshadow">
                    <img src="{{ $socialAssistance->thumbnail ? asset('storage/' . $socialAssistance->thumbnail) : asset('/assets/images/thumbnails/default.png') }}" class="h-full w-full object-cover" alt="photo">
                </div>
                @php
                    $isAvailable = strtolower($socialAssistance->availability) === 'tersedia';
                    $badgeColor = $isAvailable ? 'bg-green-500' : 'bg-red-500';
                    $badgeText = strtoupper($socialAssistance->availability);
                @endphp
                <div class="flex items-center justify-center rounded-full px-4 py-2 text-xs font-semibold text-white shadow-md {{ $badgeColor }}">
                    {{ $badgeText }}
                </div>
            </div>
            <div class="flex w-full flex-col gap-[6px]">
                <p class="text-xl font-semibold">{{ $socialAssistance->name }}</p>
                <p class="flex items-center gap-1">
                    <span class="text-sm font-medium text-desa-secondary">{{ $socialAssistance->giver_name }}</span>
                </p>
            </div>
            <hr class="border-desa-foreshadow">
            <div class="flex w-full items-center gap-3">
                <div class="flex size-[52px] shrink-0 items-center justify-center rounded-2xl bg-desa-foreshadow">
                    <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg" class="flex size-6 shrink-0" alt="icon">
                </div>
                <div class="flex w-full flex-col gap-1">
                    <p class="text-lg font-semibold leading-[22.5px] text-desa-dark-green">{{ $socialAssistance->amount }}</p>
                    <span class="font-medium text-desa-secondary">{{ $socialAssistance->category }}</span>
                </div>
            </div>
            <hr class="border-desa-foreshadow">
            <div class="flex w-full items-center gap-3">
                <div class="flex size-[52px] shrink-0 items-center justify-center rounded-2xl bg-desa-foreshadow">
                    <img src="{{ asset('/assets/images/icons/calendar-2-dark-green.svg') }}" class="flex size-6 shrink-0" alt="icon">
                </div>
                <div class="flex w-full flex-col gap-1">
                    <p class="text-lg font-semibold leading-[22.5px] text-desa-dark-green">
                        {{ \Carbon\Carbon::parse($socialAssistance->date)->translatedFormat('l, d M Y') }}
                    </p>
                    <span class="font-medium text-desa-secondary">Tanggal Pelaksanaan</span>
                </div>
            </div>
            <hr class="border-desa-foreshadow">
            <div class="flex flex-col gap-3">
                <p class="text-sm font-medium text-desa-secondary">Tentang Bantuan</p>
                <p class="font-medium leading-8">{{ $socialAssistance->description }}</p>
            </div>
        </section>
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
                    <form action="{{ route('social-assistance.destroy', $socialAssistance->id) }}" id="eventDelete" method="POST" class="form-hapus">
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