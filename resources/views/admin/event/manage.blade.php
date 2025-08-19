{{-- resources/views/admin/event/manage.blade.php --}}
@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Events Desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Detail Event Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Detail Event Desa</h1>
            </div>
            <a href="{{ route('event.edit', $event->id) }}" class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-black">
                <p class="font-medium text-white">Ubah Data</p>
                <img src="{{ asset('/assets/images/icons/edit-white.svg') }}" class="flex size-6 shrink-0" alt="icon">
            </a>
        </div>

        <div class="flex gap-[14px]">
            <section id="Informasi" class="flex flex-col shrink-0 w-full h-fit rounded-3xl p-6 gap-6 bg-white">
                <p class="font-medium leading-5 text-desa-secondary">Informasi Event</p>

                {{-- Thumbnail + Nama + Status --}}
                <div class="flex items-center w-full">
                    <div class="flex w-[100px] h-20 shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img src="{{ $event->thumbnail ? asset('storage/'.$event->thumbnail) : asset('/assets/images/thumbnails/default.png') }}"
                             class="w-full h-full object-cover" alt="photo">
                    </div>
                    <div class="flex flex-col gap-[6px] w-full ml-4 mr-9">
                        <p class="font-semibold text-lg leading-[22.5px] line-clamp-1">{{ $event->name }}</p>
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('/assets/images/icons/ticket-secondary-green.svg') }}" class="flex size-[18px] shrink-0" alt="icon">
                            <p class="font-medium text-sm text-desa-secondary">
                                Registration:
                                <span class="font-medium text-base {{ $event->status == 'Open' ? 'text-desa-dark-green' : 'text-desa-red' }}">
                                    {{ $event->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <hr class="border-desa-foreshadow">

                {{-- Tanggal --}}
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-foreshadow items-center justify-center">
                        <img src="{{ asset('/assets/images/icons/calendar-2-dark-green.svg') }}" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-dark-green">
                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d M Y') }}
                        </p>
                        <span class="font-medium text-desa-secondary">Tanggal Pelaksanaan</span>
                    </div>
                </div>

                <hr class="border-desa-foreshadow">

                {{-- Jam Mulai --}}
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-yellow/10 items-center justify-center">
                        <img src="{{ asset('/assets/images/icons/clock-yellow.svg') }}" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-yellow">
                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB
                        </p>
                        <span class="font-medium text-desa-secondary">Jam Mulai</span>
                    </div>
                </div>

                <hr class="border-desa-foreshadow">

                {{-- Durasi --}}
                <div class="flex items-center w-full gap-3">
                    <div class="flex size-[52px] shrink-0 rounded-2xl bg-desa-blue/10 items-center justify-center">
                        <img src="{{ asset('/assets/images/icons/profile-2user-blue.svg') }}" class="flex size-6 shrink-0" alt="icon">
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold text-lg leading-[22.5px] text-desa-blue">
                            {{ $event->duration_days }} Hari
                        </p>
                        <span class="font-medium text-desa-secondary">Durasi Event</span>
                    </div>
                </div>

                <hr class="border-desa-foreshadow">

                {{-- Deskripsi --}}
                <div class="flex flex-col gap-3">
                    <p class="font-medium text-sm text-desa-secondary">Tentang Event</p>
                    <p class="font-medium leading-8">{{ $event->description }}</p>
                </div>
            </section>
        </div>
    </div>
@endsection
