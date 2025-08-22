@extends('admin.layouts.app')
@section('content')

    <div class="flex flex-col gap-3 px-2 sm:gap-3.5 sm:px-4">
        <div id="Header" class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <h1 class="text-2xl font-semibold">Pembangunan Desa</h1>
            @if (auth()->check())
                <a href="{{ route('development.create') }}" class="flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-dark-green px-6 py-3 sm:w-auto sm:py-4">
                    <img src="{{ asset('assets/images/icons/add-square-white.svg') }}" class="flex size-6 shrink-0" alt="icon">
                    <p class="font-medium text-white">Tambah</p>
                </a>
            @endif
        </div>
        <section id="List-Pembangunan-Desa" class="flex flex-col gap-[14px]">
            <form id="Page-Search" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="w-full shrink-0 md:w-[370px]">
                    <label class="group peer relative w-full">
                        <input type="text" placeholder="Cari nama pembangunan desa" class="h-12 w-full appearance-none rounded-2xl py-3 pl-12 pr-6 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black md:h-14 md:py-4">
                        <div class="absolute left-4 top-1/2 flex size-5 shrink-0 -translate-y-1/2 md:size-6">
                            <img src="{{ asset('assets/images/icons/box-search-secondary-green.svg') }}" class="size-5 flex group-has-[:placeholder-shown]:flex md:size-6" alt="icon">
                            <img src="{{ asset('assets/images/icons/box-search-black.svg') }}" class="hidden size-5 group-has-[:placeholder-shown]:hidden md:size-6" alt="icon">
                        </div>
                    </label>
                </div>
                <div class="flex w-full flex-col gap-4 md:w-auto md:flex-row">
                    <div class="flex items-center gap-[10px]">
                        <span class="text-sm font-medium leading-5 md:text-base">Show</span>
                        <div class="relative w-full md:w-auto">
                            <select name="" id="" class="h-12 w-full appearance-none rounded-2xl py-3 pl-6 pr-[52px] font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black md:h-14 md:py-4">
                                <option value="5" selected>5 Entries</option>
                                <option value="10">10 Entries</option>
                                <option value="20">20 Entries</option>
                                <option value="30">30 Entries</option>
                                <option value="40">40 Entries</option>
                                <option value="50">50 Entries</option>
                            </select>
                            <img src="{{ asset('assets/images/icons/arrow-down-black.svg') }}" class="absolute right-6 top-1/2 size-5 -translate-y-1/2 md:size-6" alt="icon">
                        </div>
                    </div>
                    <button type="button" class="flex h-12 w-full items-center justify-center gap-1 rounded-2xl border border-desa-background bg-white px-6 py-3 md:h-14 md:w-fit md:py-4">
                        <img src="{{ asset('assets/images/icons/filter-black.svg') }}" class="size-5 md:size-6" alt="icon">
                        <span class="text-sm font-medium leading-5 md:text-base">Filter</span>
                    </button>
                </div>
            </form>

            @forelse ($developments as $d)
                <div class="card flex flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
                    <div class="flex w-full flex-col gap-4 md:flex-row md:items-center">
                        <div class="h-auto w-full shrink-0 overflow-hidden rounded-2xl bg-desa-foreshadow md:h-20 md:w-28">
                            <img src="{{ $d->thumbnail ? asset('storage/' . $d->thumbnail) : asset('assets/images/thumbnails/placeholder.png') }}" class="h-full w-full object-cover" alt="photo">
                        </div>
                        <div class="flex w-full flex-col gap-[6px]">
                            <a href="{{ route('development.manage', $d->id) }}">
                                <p class="line-clamp-1 text-base font-semibold leading-tight md:text-lg">{{ $d->nama_projek }}</p>
                            </a>
                            <div class="flex items-center gap-1 text-sm md:text-base">
                                <img src="{{ asset('assets/images/icons/user-square-secondary-green.svg') }}" class="size-4 md:size-[18px]" alt="icon">
                                <p class="text-sm font-medium text-desa-secondary">
                                    <span class="text-base font-medium text-desa-dark-green">{{ $d->giver }}</span>
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('development.manage', $d->id) }}" class="flex w-full shrink-0 items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-3 text-sm md:w-auto md:py-4 md:text-base">
                            <span class="font-medium text-white">Manage</span>
                        </a>
                    </div>
                    <hr class="border-desa-background">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center rounded-2xl bg-desa-foreshadow md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/wallet-3-red.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold leading-snug text-desa-red md:text-lg">{{ $d->total_dana }}</p>
                                <p class="text-sm font-medium text-desa-secondary">Dana Pembangunan</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center overflow-hidden rounded-2xl {{ $d->status === 'Completed' ? 'bg-desa-foreshadow' : 'bg-desa-blue/10' }} md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/' . ($d->status === 'Completed' ? 'process-success.svg' : 'process-ongoing.svg')) }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold leading-snug {{ $d->status === 'Completed' ? 'text-desa-dark-green' : 'text-desa-blue' }} md:text-lg">{{ $d->status }}</p>
                                <p class="text-sm font-medium text-desa-secondary">Status</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 items-center justify-center overflow-hidden rounded-2xl bg-desa-foreshadow md:size-[52px]">
                                <img src="{{ asset('assets/images/icons/calendar-2-black.svg') }}" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold leading-snug text-desa-black md:text-lg">{{ $d->tanggal_pembangunan ? \Carbon\Carbon::parse($d->tanggal_pembangunan)->format('D, d M Y') : '-' }}</p>
                                <p class="text-sm font-medium text-desa-secondary">Tanggal Pelaksanaan</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl bg-white p-6 text-center text-gray-500">
                    <p>Belum ada data pembangunan desa.</p>
                </div>
            @endforelse
        </section>
        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <div class="text-sm text-gray-700">
                Menampilkan <span id="showingStart">{{ $developments->firstItem() }}</span> sampai <span
                    id="showingEnd">{{ $developments->lastItem() }}</span> dari <span
                    id="totalRows">{{ $developments->total() }}</span>
                data
            </div>
            <div id="pagination">
                {{ $developments->links() }}
            </div>
        </div>
    </div>
@endsection
