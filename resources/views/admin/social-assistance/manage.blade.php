@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex flex-wrap gap-1 items-center leading-5 text-desa-secondary text-xs sm:text-sm md:text-base">
                    <a href="{{ route('social-assistance.index') }}"
                        class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize hover:underline">

                        <p>Bantuan sosial</p>
                    </a>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize">Manage bantuan sosial
                    </p>
                </div>
                <h1 class="font-semibold text-2xl">Manage Bantuan Sosial</h1>
            </div>
            @if (auth()->check())
                <div class="flex items-center gap-3">
                    <form action="{{ route('social-assistance.destroy', $socialAssistance->id) }}"
                        id="socialAssistanceDelete" method="POST" class="form-hapus"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-red">
                            <p class="font-medium text-white">Hapus Data</p>
                            <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </button>
                    </form>

                    <a href="{{ route('social-assistance.edit', $socialAssistance->id) }}"
                        class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                        <p class="font-medium text-white">Ubah Data</p>
                        <img src="{{ asset('/assets/images/icons/edit-white.svg') }}" class="flex size-6 shrink-0"
                            alt="icon">
                    </a>
                </div>
            @endif
        </div>

        {{-- Full Width Section --}}
        <section id="Informasi-Bantuan-Sosial" class="flex flex-col w-full h-fit rounded-3xl p-6 gap-6 bg-white">
            <p class="font-medium leading-5 text-desa-secondary">Informasi Bantuan Sosial</p>
            <div class="flex items-center justify-between gap-4">
                <div class="flex w-[120px] h-[100px] shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">
                    <img src="{{ $socialAssistance->thumbnail ? asset('storage/' . $socialAssistance->thumbnail) : asset('/assets/images/thumbnails/default.png') }}"
                        class="w-full h-full object-cover" alt="photo">
                </div>
                @php
                    $isAvailable = strtolower($socialAssistance->availability) === 'tersedia';
                    $badgeColor = $isAvailable ? 'bg-green-500' : 'bg-red-500';
                    $badgeText = strtoupper($socialAssistance->availability);
                @endphp

                <div
                    class="flex items-center justify-center px-4 py-2 rounded-full text-white font-semibold text-xs shadow-md {{ $badgeColor }}">
                    {{ $badgeText }}
                </div>
            </div>
            <div class="flex flex-col gap-[6px] w-full">
                <p class="font-semibold text-xl">{{ $socialAssistance->name }}</p>
                <p class="flex items-center gap-1">
                    <span class="font-medium text-sm text-desa-secondary">{{ $socialAssistance->giver_name }}</span>
                </p>
            </div>
            <hr class="border-desa-foreshadow">
            <div class="flex items-center w-full gap-3">
                <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                    <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg" class="flex size-6 shrink-0"
                        alt="icon">
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <p class="font-semibold text-lg leading-[22.5px] text-desa-dark-green">{{ $socialAssistance->amount }}
                    </p>
                    <span class="font-medium text-desa-secondary">
                        {{ $socialAssistance->category }}
                    </span>
                </div>
            </div>
            <hr class="border-desa-foreshadow">

            {{-- Tanggal --}}
            <div class="flex items-center w-full gap-3">
                <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                    <img src="{{ asset('/assets/images/icons/calendar-2-dark-green.svg') }}" class="flex size-6 shrink-0"
                        alt="icon">
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <p class="font-semibold text-lg leading-[22.5px] text-desa-dark-green">
                        {{ \Carbon\Carbon::parse($socialAssistance->date)->translatedFormat('l, d M Y') }}
                    </p>
                    <span class="font-medium text-desa-secondary">Tanggal Pelaksanaan</span>
                </div>
            </div>
            <hr class="border-desa-foreshadow">
            <div class="flex flex-col gap-3">
                <p class="font-medium text-sm text-desa-secondary">Tentang Bantuan</p>
                <p class="font-medium leading-8">{{ $socialAssistance->description }}</p>
            </div>
        </section>
    </div>

    {{-- Modal --}}
    <div id="Modal-Delete" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert" class="flex flex-col w-[335px] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 gap-3 bg-desa-black">
                <p class="font-medium leading-5 text-white">Hapus Bantuan Sosial?</p>
                <button class="btn-close-modal">
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0"
                        alt="icon">
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
                        <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0"
                            alt="">
                        <span class="font-semibold text-sm text-white">Iya Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
