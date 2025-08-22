@extends('admin.layouts.app')
@section('content')

    <div class="flex flex-col gap-3 px-2 sm:gap-3.5 sm:px-4">
    <div id="Header" class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
        <h1 class="text-2xl font-semibold">Events Desa</h1>
        @auth
            <a href="{{ route('event.create') }}" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-desa-dark-green px-6 py-3 sm:w-auto">
                <img src="{{ asset('assets/images/icons/add-square-white.svg') }}" class="size-6" alt="icon">
                <p class="font-medium text-white">Tambah</p>
            </a>
        @endauth
    </div>

    <section id="List-Event-Desa" class="flex flex-col gap-[14px]">
        <form id="Page-Search" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="w-full shrink-0 md:w-[370px]">
                <label class="group relative w-full">
                    <input type="text" placeholder="Cari nama event desa" class="h-12 w-full appearance-none rounded-2xl py-3 pl-12 pr-6 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black md:h-14">
                    <div class="absolute left-4 top-1/2 flex size-5 -translate-y-1/2 md:size-6">
                        <img src="{{ asset('assets/images/icons/calendar-search-secondary-green.svg') }}" class="flex group-has-[:placeholder-shown]:flex" alt="icon">
                        <img src="{{ asset('assets/images/icons/calendar-search-black.svg') }}" class="hidden group-has-[:placeholder-shown]:hidden" alt="icon">
                    </div>
                </label>
            </div>

            <div class="flex w-full flex-col gap-4 md:w-auto md:flex-row">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium md:text-base">Show</span>
                    <div class="relative w-full md:w-auto">
                        <select class="h-12 w-full appearance-none rounded-2xl py-3 pl-6 pr-[52px] font-medium ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black md:h-14">
                            <option value="5" selected>5 Entries</option>
                            <option value="10">10 Entries</option>
                        </select>
                        <img src="{{ asset('assets/images/icons/arrow-down-black.svg') }}" class="absolute right-6 top-1/2 size-5 -translate-y-1/2 md:size-6" alt="icon">
                    </div>
                </div>
                <button type="button" class="flex h-12 w-full items-center justify-center gap-2 rounded-2xl border border-desa-background bg-white px-6 py-3 md:h-14 md:w-fit">
                    <img src="{{ asset('assets/images/icons/filter-black.svg') }}" class="size-5 md:size-6" alt="icon">
                    <span class="text-sm font-medium md:text-base">Filter</span>
                </button>
            </div>
        </form>

        <div class="grid gap-6">
            @forelse($events as $event)
                <div class="card flex flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
                    <div class="flex w-full flex-col gap-4 md:flex-row md:items-center">
                        <div class="aspect-[4/3] w-full shrink-0 overflow-hidden rounded-2xl bg-desa-foreshadow md:h-20 md:w-28">
                            <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('assets/images/thumbnails/placeholder.png') }}" class="h-full w-full object-cover" alt="photo">
                        </div>
                        <div class="flex w-full flex-col gap-2">
                            <a href="{{ route('event.manage', $event->id) }}">
                                <p class="line-clamp-1 text-base font-semibold leading-tight md:text-lg">{{ $event->name }}</p>
                            </a>
                            <p class="flex items-center gap-1 text-sm md:text-base">
                                <img src="{{ asset('assets/images/icons/ticket-secondary-green.svg') }}" class="size-4 md:size-[18px]" alt="icon">
                                <span class="font-medium text-desa-secondary">
                                    Registration:
                                    <span class="font-medium capitalize text-desa-dark-green">{{ $event->status }}</span>
                                </span>
                            </p>
                        </div>
                        <a href="{{ route('event.manage', $event->id) }}" class="flex w-full shrink-0 items-center justify-center gap-2 rounded-2xl bg-desa-black px-6 py-3 text-sm md:w-auto md:text-base">
                            <span class="font-medium text-white">Manage</span>
                        </a>
                    </div>
                    <hr class="border-desa-background">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center rounded-2xl bg-desa-blue/10 md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/timer-black.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-lg font-semibold text-desa-blue">{{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : '-' }}</p>
                                <p class="text-sm font-medium text-desa-secondary">Jam Mulai</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center rounded-2xl bg-desa-blue/10 md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/profile-2user-blue.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-lg font-semibold text-desa-blue">{{ number_format($event->partisipasi ?? 0, 0, ',', '.') }} Warga</p>
                                <p class="text-sm font-medium text-desa-secondary">Total Partisipasi</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center rounded-2xl bg-desa-foreshadow md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/calendar-2-dark-green.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-lg font-semibold text-desa-dark-green">{{ $event->date ? \Carbon\Carbon::parse($event->date)->translatedFormat('l, d M Y') : '-' }}</p>
                                <p class="text-sm font-medium text-desa-secondary">Tanggal Pelaksanaan</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl bg-white p-6 text-center text-gray-500">
                    <p>Belum ada event.</p>
                </div>
            @endforelse
        </div>
    </section>
     <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <div class="text-sm text-gray-700">
                Menampilkan <span id="showingStart">{{ $events->firstItem() }}</span> sampai <span
                    id="showingEnd">{{ $events->lastItem() }}</span> dari <span id="totalRows">{{ $events->total() }}</span>
                data
            </div>
            <div id="pagination">
                {{ $events->links() }}
            </div>
        </div>
</div>
@endsection