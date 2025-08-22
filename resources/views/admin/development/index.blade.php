@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <h1 class="font-semibold text-2xl">Pembangunan Desa</h1>
            @if (auth()->check())
                <a href="{{ route('development.create') }}"
                    class="flex items-center rounded-2xl py-4 px-6 gap-[10px] bg-desa-dark-green">
                    <img src="assets/images/icons/add-square-white.svg" class="flex size-6 shrink-0" alt="icon">
                    <p class="font-medium text-white">Add New</p>
                </a>
            @endif
        </div>
        <section id="List-Pembangunan-Desa" class="flex flex-col gap-[14px]">
            <form id="Page-Search" class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex flex-col gap-3 w-full md:w-[370px] shrink-0">
                    <label class="relative group peer w-full valid">
                        <input type="text" placeholder="Cari nama pembangunan desa"
                            class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 md:py-4 pl-12 pr-6 font-medium placeholder:text-desa-secondary transition-all duration-300">
                        <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-5 md:size-6 shrink-0">
                            <img src="assets/images/icons/box-search-secondary-green.svg"
                                class="size-5 md:size hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="assets/images/icons/box-search-black.svg"
                                class="size-5 md:size flex group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
                <div class="options flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <div class="flex items-center gap-[10px]">
                        <span class="font-medium text-sm md:text-base leading-5">Show</span>
                        <div class="relative w-full md:w-auto">
                            <select name="" id=""
                                class="appearance-none outline-none w-full h-12 md:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 md:py-4 px-6 pr-[52px] font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <option value="5" selected>5 Entries</option>
                                <option value="10">10 Entries</option>
                                <option value="20">20 Entries</option>
                                <option value="30">30 Entries</option>
                                <option value="40">40 Entries</option>
                                <option value="50">50 Entries</option>
                            </select>
                            <img src="assets/images/icons/arrow-down-black.svg"
                                class="absolute transform -translate-y-1/2 top-1/2 right-6 size-5 md:size-6" alt="icon">
                        </div>
                    </div>
                    <button type="button"
                        class="flex items-center gap-1 h-12 md:h-14 w-full md:w-fit rounded-2xl border border-desa-background bg-white py-3 md:py-4 px-6">
                        <img src="assets/images/icons/filter-black.svg" class="size-5 md:size-6" alt="icon">
                        <span class="font-medium text-sm md:text-base leading-5">Filter</span>
                    </button>
                </div>
            </form>
            @forelse ($developments as $d)
                <div class="card flex flex-col gap-6 rounded-3xl p-4 md:p-6 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center w-full gap-4 md:gap-0">
                        <div
                            class="flex 
                            w-full aspect-[3/2]
                            sm:w-[100px] sm:h-20
                            shrink-0 rounded-2x1 overflow-hidden bg-desa-foreshadow">

                            <img src="{{ $d->thumbnail ? asset('storage/' . $d->thumbnail) : asset('assets/images/thumbnails/placeholder.png') }}"
                                class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col gap-[6px] w-full ml-4 mr-9">
                            <a href="{{ route('development.manage', $d->id) }}">
                                <p class="font-semibold text-base md:text-lg leading-tight line-clamp-1">
                                    {{ $d->nama_projek }}</p>
                            </a>
                            <div class="flex items-center gap-1 text-sm md:text-base">
                                <img src="assets/images/icons/user-square-secondary-green.svg" class="size-4 md:size-[18px]"
                                    alt="icon">
                                <p class="font-medium text-sm text-desa-secondary">

                                    <span class="font-medium text-base text-desa-dark-green">
                                        {{ $d->giver }}
                                    </span>
                                </p>
                            </div>
                        </div>


                        <a href="{{ route('development.manage', $d->id) }}"
                            class="flex items-center justify-center gap-[10px] rounded-2xl py-3 md:py-4 px-6 bg-desa-black text-sm md:text-base">
                            <span class="font-medium text-white">Manage</span>
                        </a>
                    </div>
                    <hr class="border-desa-background">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Dana Pembangunan -->
                        <div class="flex items-center gap-3">
                            <div
                                class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow">
                                <img src="assets/images/icons/wallet-3-red.svg" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold text-base md:text-lg leading-snug text-desa-red">
                                    {{ $d->total_dana }}
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Dana Pembangunan</p>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="flex items-center gap-3">
                            <div
                                class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center 
            {{ $d->status === 'Completed' ? 'bg-desa-foreshadow' : 'bg-desa-blue/10' }} overflow-hidden">
                                <img src="assets/images/icons/{{ $d->status === 'Completed' ? 'process-success.svg' : 'process-ongoing.svg' }}"
                                    class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p
                                    class="font-semibold text-base md:text-lg leading-snug {{ $d->status === 'Completed' ? 'text-desa-dark-green' : 'text-desa-blue' }}">
                                    {{ $d->status }}
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Status</p>
                            </div>
                        </div>

                        <!-- Tanggal Pelaksanaan -->
                        <div class="flex items-center gap-3">
                            <div class="flex size-10 md:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow overflow-hidden"
                                style="background-color: #f3f3f3;">
                                <img src="assets/images/icons/calendar-2-black.svg" class="size-5 md:size-6" alt="icon">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold text-base md:text-lg leading-snug text-desa-black">
                                    {{ $d->tanggal_pembangunan ? \Carbon\Carbon::parse($d->tanggal_pembangunan)->format('D, d M Y') : '-' }}
                                </p>
                                <p class="font-medium text-sm text-desa-secondary">Tanggal Pelaksanaan</p>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
            @endforelse
        </section>
        <nav id="Pagination">
            <ul class="flex items-center gap-3">
                {{ $developments->links() }}

                <li class="group">
                    <button type="button" disabled
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow disabled:!bg-desa-foreshadow group-hover:bg-desa-dark-green transition-setup">
                        <img src="assets/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 group-hover:hidden group-disabled/arrow:!hidden" alt="icon">
                        <img src="assets/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 group-hover:flex group-disabled/arrow:!hidden" alt="icon">
                        <img src="assets/images/icons/disabled-arrow-pagination.svg"
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
                        <img src="assets/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 rotate-180 group-hover:hidden group-disabled/arrow:!hidden"
                            alt="icon">
                        <img src="assets/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 rotate-180 group-hover:flex group-disabled/arrow:!hidden"
                            alt="icon">
                        <img src="assets/images/icons/disabled-arrow-pagination.svg"
                            class="hidden size-6 shrink-0 rotate-180 group-disabled/arrow:!flex" alt="icon">
                    </button>
                </li>
            </ul>
        </nav>
    </div>
@endsection
