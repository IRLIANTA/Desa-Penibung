@extends('admin.layouts.app')
@section('content')
<div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
    <div id="Header" class="flex items-center justify-between">
        <h1 class="font-semibold text-2xl">Events Desa</h1>
        @auth
            <a href="{{ route('event.create') }}"
                class="flex items-center rounded-2xl py-3 px-6 gap-2 bg-desa-dark-green">
                <img src="{{ asset('assets/images/icons/add-square-white.svg') }}" class="size-6" alt="icon">
                <p class="font-medium text-white">Add New</p>
            </a>
        @endauth
    </div>

    <section id="List-Event-Desa" class="flex flex-col gap-[14px]">
        {{-- Search + Show + Filter --}}
        <form id="Page-Search" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-col gap-3 w-full md:w-[370px] shrink-0">
                <label class="relative group w-full">
                    <input type="text" placeholder="Cari nama event desa"
                        class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 pl-12 pr-6 font-medium placeholder:text-desa-secondary transition-all duration-300">
                    <div class="absolute top-1/2 -translate-y-1/2 left-4 flex size-5 md:size-6">
                        <img src="{{ asset('assets/images/icons/calendar-search-secondary-green.svg') }}"
                            class="hidden group-has-[:placeholder-shown]:flex" alt="icon">
                        <img src="{{ asset('assets/images/icons/calendar-search-black.svg') }}"
                            class="flex group-has-[:placeholder-shown]:hidden" alt="icon">
                    </div>
                </label>
            </div>

            {{-- Show & Filter --}}
            <div class="options flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="flex items-center gap-2">
                    <span class="font-medium text-sm md:text-base">Show</span>
                    <div class="relative w-full md:w-auto">
                        <select
                            class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 px-6 pr-[52px] font-medium transition-all duration-300">
                            <option value="5" selected>5 Entries</option>
                            <option value="10">10 Entries</option>
                        </select>
                        <img src="{{ asset('assets/images/icons/arrow-down-black.svg') }}"
                            class="absolute top-1/2 -translate-y-1/2 right-6 size-5 md:size-6" alt="icon">
                    </div>
                </div>
                <button type="button"
                    class="flex items-center gap-2 h-12 md:h-14 w-full md:w-fit rounded-2xl border border-desa-background bg-white py-3 px-6">
                    <img src="{{ asset('assets/images/icons/filter-black.svg') }}" class="size-5 md:size-6" alt="icon">
                    <span class="font-medium text-sm md:text-base">Filter</span>
                </button>
            </div>
        </form>

        {{-- Card Event --}}
        <div class="grid gap-6">
            @forelse($events as $event)
                <div class="card flex flex-col gap-6 rounded-3xl p-4 md:p-6 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center w-full gap-4 md:gap-0">
                        
                        {{-- Thumbnail --}}
                        <div class="flex w-full aspect-square md:w-[100px] md:h-20 shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">
                            <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('assets/images/thumbnails/placeholder.png') }}"
                                class="w-full h-full object-cover" alt="photo">
                        </div>

                        {{-- Detail --}}
                        <div class="flex flex-col gap-2 w-full md:ml-4 md:mr-9">
                            <a href="{{ route('event.manage', $event->id) }}">
                                <p class="font-semibold text-base md:text-lg leading-tight line-clamp-1">
                                    {{ $event->name }}
                                </p>
                            </a>
                            <p class="flex items-center gap-1 text-sm md:text-base">
                                <img src="{{ asset('assets/images/icons/ticket-secondary-green.svg') }}"
                                    class="size-4 md:size-[18px]" alt="icon">
                                <span class="font-medium text-desa-secondary">
                                    Registration:
                                    <span class="font-medium text-desa-dark-green capitalize">{{ $event->status }}</span>
                                </span>
                            </p>
                        </div>

                        {{-- Button Manage --}}
                        <a href="{{ route('event.manage', $event->id) }}"
                            class="flex items-center justify-center gap-2 rounded-2xl py-3 px-6 bg-desa-black text-sm md:text-base">
                            <span class="font-medium text-white">Manage</span>
                        </a>
                    </div>

                    <hr class="border-desa-background">

                    {{-- Info Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- Jam Mulai --}}
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-blue/10">
                                <img src="{{ asset('assets/images/icons/timer-black.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold text-lg text-desa-blue">
                                    {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : '-' }}
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Jam Mulai</p>
                            </div>
                        </div>

                        {{-- Total Partisipasi --}}
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-blue/10">
                                <img src="{{ asset('assets/images/icons/profile-2user-blue.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold text-lg text-desa-blue">
                                    {{ number_format($event->partisipasi ?? 0, 0, ',', '.') }} Warga
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Total Partisipasi</p>
                            </div>
                        </div>

                        {{-- Tanggal --}}
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow">
                                <img src="{{ asset('assets/images/icons/calendar-2-dark-green.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold text-lg text-desa-dark-green">
                                    {{ $event->date ? \Carbon\Carbon::parse($event->date)->translatedFormat('l, d M Y') : '-' }}
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Tanggal Pelaksanaan</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-desa-secondary">Belum ada event.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
