@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <h1 class="font-semibold text-2xl">List Bantuan Sosial</h1>
            @auth

                <a href="{{ route('social-assistance.create') }}"
                    class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-dark-green">
                    <img src="{{ asset('/assets') }}/images/icons/add-square-white.svg" class="flex size-6 shrink-0"
                        alt="icon">
                    <p class="font-medium text-white">Add New</p>
                </a>
            @endauth
        </div>
        <section id="List-Bantuan-Sosial" class="flex flex-col gap-[14px]">
            <form id="Page-Search" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex flex-col gap-3 w-full md:w-[370px] shrink-0">
                    <label class="relative group peer w-full valid">
                        <input type="text" placeholder="Cari nama bantuan social"
                            class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 md:py-4 pl-12 pr-6 font-medium placeholder:text-desa-secondary transition-all duration-300">
                        <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-5 md:size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/receipt-search-secondary-green.svg"
                                class="size-5 md:size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/receipt-search-black.svg"
                                class="size-5 md:size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>

                <!-- show & filter pindah ke bawah saat hp -->
                <div class="options flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <div class="flex items-center gap-[10px]">
                        <span class="font-medium text-sm md:text-base leading-5">Show</span>
                        <div class="relative w-full md:w-auto">
                            <select
                                class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 md:py-4 px-6 pr-[52px] font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <option value="5" selected>5 Entries</option>
                                <option value="10">10 Entries</option>
                            </select>
                            <img src="{{ asset('/assets') }}/images/icons/arrow-down-black.svg"
                                class="absolute transform -translate-y-1/2 top-1/2 right-6 size-5 md:size-6" alt="icon">
                        </div>
                    </div>
                    <button type="button"
                        class="flex items-center gap-1 h-12 md:h-14 w-full md:w-fit rounded-2xl border border-desa-background bg-white py-3 md:py-4 px-6">
                        <img src="{{ asset('/assets') }}/images/icons/filter-black.svg" class="size-5 md:size-6"
                            alt="icon">
                        <span class="font-medium text-sm md:text-base leading-5">Filter</span>
                    </button>
                </div>
            </form>

            <div class="grid gap-6">
                @forelse($socialAssistances as $socialAssistance)
                    {{-- Card Bansos --}}
                    <div class="card flex flex-col gap-6 rounded-3xl p-4 md:6 bg-white">
                        <div class="flex flex-col md:flex-row md:items-center w-full gap-4 md:gap-0">

                            <div
                                class="flex 
                                w-full aspect-square
                                md:w-[100px] md:h-20
                                shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">

                                <img src="{{ $socialAssistance->thumbnail
                                    ? asset('storage/' . $socialAssistance->thumbnail)
                                    : asset('assets/images/thumbnails/placeholder.png') }}"
                                    class="w-full h-full object-cover" alt="photo">
                            </div>


                            <div class="flex flex-col gap-[6px] w-full md:ml-4 md:mr-9">
                                <a href="{{ route('social-assistance.manage', $socialAssistance->id) }}">
                                    <p class="font-semibold text-base md:text-lg leading-tight line-clamp-1">
                                        {{ $socialAssistance->name }}</p>
                                </a>
                                <p class="flex items-center gap-1 text-sm md:text-base">
                                    <img src="{{ asset('/assets') }}/images/icons/profile-secondary-green.svg"
                                        class="size-4 md:size-[18px]" alt="icon" class="flex size-[18px] shrink-0"
                                        alt="icon">
                                    <span
                                        class="font-medium text-sm text-desa-secondary">{{ $socialAssistance->giver_name }}</span>
                                </p>
                            </div>
                            <a href="{{ route('social-assistance.manage', $socialAssistance->id) }}"
                                class="flex items-center justify-center gap-[10px] rounded-2xl py-3 md:py-4 px-6 bg-desa-black text-sm md:text-base">
                                <span class="font-medium text-white">Manage</span>
                            </a>
                        </div>
                        <hr class="border-desa-background">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow">
                                    <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg"
                                        class="size-5 md:size-6" alt="icon">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="font-semibold text-lg leading-5 text-desa-dark-green">
                                        {{ $socialAssistance->amount ?? '-' }}
                                    </p>
                                    <p class="font-medium text-sm text-desa-secondary">
                                        {{ $socialAssistance->category ?? '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 sm:gap-3">
                                <div
                                    class="flex size-10 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden">
                                    <img src="{{ asset('assets/images/icons/calendar-2-dark-green.svg') }}"
                                        class="size-5 sm:size-6" alt="icon">
                                </div>
                                <div class="flex flex-col gap-0.5 sm:gap-1">
                                    <p class="font-semibold text-base sm:text-lg text-desa-dark-green">
                                        {{ $socialAssistance->date ? \Carbon\Carbon::parse($socialAssistance->date)->translatedFormat('l, d M Y') : '-' }}
                                    </p>
                                    <p class="font-medium text-xs sm:text-sm text-desa-secondary">Tanggal Pelaksanaan</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 group">
                                <div
                                    class="flex size-[52px] rounded-2xl items-center justify-center overflow-hidden
        {{ $socialAssistance->availability == 'Tersedia'
            ? 'bg-green-100 group-hover:bg-green-500'
            : 'bg-red-100 group-hover:bg-red-500' }}">
                                    <img src="{{ $socialAssistance->availability == 'Tersedia'
                                        ? asset('/assets/images/icons/check-square-green.svg')
                                        : asset('/assets/images/icons/minus-square-red.svg') }}"
                                        class="flex size-6 shrink-0" alt="icon">
                                </div>

                                <div class="flex flex-col gap-1">
                                    <p
                                        class="font-semibold text-lg leading-5 transition-colors duration-300 
            {{ $socialAssistance->availability == 'Tersedia'
                ? 'text-green-600 group-hover:text-white'
                : 'text-red-600 group-hover:text-white' }}">
                                        {{ $socialAssistance->availability }}
                                    </p>
                                    <p class="font-medium text-sm text-desa-secondary">Status Bansos</p>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-desa-secondary">Belum ada event.</p>
                @endforelse

            </div>
        </section>
        <nav id="Pagination">
            <ul class="flex items-center gap-3">
                <li class="group">
                    <button type="button" disabled
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow disabled:!bg-desa-foreshadow group-hover:bg-desa-dark-green transition-setup">
                        <img src="{{ asset('/assets') }}/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 group-hover:hidden group-disabled/arrow:!hidden" alt="icon">
                        <img src="{{ asset('/assets') }}/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 group-hover:flex group-disabled/arrow:!hidden" alt="icon">
                        <img src="{{ asset('/assets') }}/images/icons/disabled-arrow-pagination.svg"
                            class="hidden size-6 shrink-0 group-disabled/arrow:!flex" alt="icon">
                    </button>
                </li>
                <li class="group active">
                    <a
                        class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                        <span
                            class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                            1
                        </span>
                    </a>
                </li>
                <li class="group">
                    <a
                        class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                        <span
                            class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                            2
                        </span>
                    </a>
                </li>
                <li class="group">
                    <a
                        class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                        <span
                            class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                            3
                        </span>
                    </a>
                </li>
                <li class="group">
                    <a
                        class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                        <span
                            class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                            4
                        </span>
                    </a>
                </li>
                <li class="group">
                    <a
                        class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                        <span
                            class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                            5
                        </span>
                    </a>
                </li>
                <li class="group">
                    <button type="button"
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow disabled:!bg-desa-foreshadow group-hover:bg-desa-dark-green transition-setup">
                        <img src="{{ asset('/assets') }}/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 rotate-180 group-hover:hidden group-disabled/arrow:!hidden"
                            alt="icon">
                        <img src="{{ asset('/assets') }}/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 rotate-180 group-hover:flex group-disabled/arrow:!hidden"
                            alt="icon">
                        <img src="{{ asset('/assets') }}/images/icons/disabled-arrow-pagination.svg"
                            class="hidden size-6 shrink-0 rotate-180 group-disabled/arrow:!flex" alt="icon">
                    </button>
                </li>
            </ul>
        </nav>
    </div>
@endsection
