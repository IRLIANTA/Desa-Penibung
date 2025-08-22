@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col gap-3 px-2 sm:gap-3.5 sm:px-4">
        <!-- Header - Responsive -->
        <div id="Header" class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0">
            <h1 class="font-semibold text-xl sm:text-2xl">List Bantuan Sosial</h1>
            @auth
                <a href="{{ route('social-assistance.create') }}"
                    class="flex items-center justify-center w-full sm:w-auto rounded-2xl py-3 sm:py-4 px-4 sm:px-6 gap-[10px] bg-desa-dark-green">
                    <img src="{{ asset('/assets') }}/images/icons/add-square-white.svg" class="flex size-5 sm:size-6 shrink-0"
                        alt="icon">
                    <p class="font-medium text-sm sm:text-base text-white">Tambah</p>
                </a>
            @endauth
        </div>

        <!-- List Bantuan Sosial Section -->
        <section id="List-Bantuan-Sosial" class="flex flex-col gap-3 sm:gap-[14px]">
            <!-- Search Form - Mobile First -->
            <form id="Page-Search" class="flex flex-col gap-3 sm:gap-4">
                <!-- Search Input -->
                <div class="flex flex-col gap-3 w-full">
                    <label class="relative group peer w-full valid">
                        <input type="text" placeholder="Cari nama bantuan social"
                            class="appearance-none outline-none w-full h-12 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-3 sm:py-4 pl-10 sm:pl-12 pr-4 sm:pr-6 font-medium text-sm sm:text-base placeholder:text-desa-secondary transition-all duration-300">
                        <div
                            class="absolute transform -translate-y-1/2 top-1/2 left-3 sm:left-4 flex size-5 sm:size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/receipt-search-secondary-green.svg"
                                class="size-5 sm:size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/receipt-search-black.svg"
                                class="size-5 sm:size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>

                <!-- Options - Mobile Stacked -->
                <div class="options flex flex-col sm:flex-row gap-3 sm:gap-4 w-full">
                    <!-- Show Entries -->
                    <div class="flex items-center gap-2 sm:gap-[10px] w-full sm:w-auto">
                        <span class="font-medium text-sm sm:text-base leading-5 whitespace-nowrap">Show</span>
                        <div class="relative w-full sm:w-auto min-w-[120px]">
                            <select
                                class="appearance-none outline-none w-full h-10 sm:h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-2 sm:py-4 px-3 sm:px-6 pr-8 sm:pr-[52px] font-medium text-sm sm:text-base placeholder:text-desa-secondary transition-all duration-300">
                                <option value="5" selected>5 Entries</option>
                                <option value="10">10 Entries</option>
                            </select>
                            <img src="{{ asset('/assets') }}/images/icons/arrow-down-black.svg"
                                class="absolute transform -translate-y-1/2 top-1/2 right-3 sm:right-6 size-4 sm:size-6"
                                alt="icon">
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <button type="button"
                        class="flex items-center justify-center gap-2 h-10 sm:h-14 w-full sm:w-fit rounded-2xl border border-desa-background bg-white py-2 sm:py-4 px-4 sm:px-6">
                        <img src="{{ asset('/assets') }}/images/icons/filter-black.svg" class="size-4 sm:size-6"
                            alt="icon">
                        <span class="font-medium text-sm sm:text-base leading-5">Filter</span>
                    </button>
                </div>
            </form>

            <!-- Social Assistance Cards -->
            <div class="grid gap-4 sm:gap-6">
                @forelse($socialAssistances as $socialAssistance)
                    <!-- Card Bansos - Mobile Optimized -->
                    <div class="card flex flex-col gap-4 sm:gap-6 rounded-2xl sm:rounded-3xl p-3 sm:p-6 bg-white shadow-sm">
                        <!-- Card Header - Mobile Stack -->
                        <div class="flex flex-col sm:flex-row sm:items-center w-full gap-3 sm:gap-4">
                            <!-- Thumbnail -->

                            <div
                                class="flex 
             w-full aspect-[3/2]
             sm:w-[100px] sm:h-20
             shrink-0 rounded-2xl overflow-hidden bg-desa-foreshadow">

                                <img src="{{ $socialAssistance->thumbnail
                                    ? asset('storage/' . $socialAssistance->thumbnail)
                                    : asset('assets/images/thumbnails/placeholder.png') }}"
                                    class="w-full h-full object-cover" alt="photo">
                            </div>

                            <!-- Content -->
                            <div class="flex flex-col gap-2 w-full sm:ml-4 sm:mr-9">
                                <a href="{{ route('social-assistance.manage', $socialAssistance->id) }}">
                                    <p class="font-semibold text-lg sm:text-xl leading-tight line-clamp-2 sm:line-clamp-1">
                                        {{ $socialAssistance->name }}
                                    </p>
                                </a>
                                <p class="flex items-center gap-2">
                                    <img src="{{ asset('/assets') }}/images/icons/profile-secondary-green.svg"
                                        class="size-4 sm:size-[18px] shrink-0" alt="icon">
                                    <span class="font-medium text-sm sm:text-base text-desa-secondary">
                                        {{ $socialAssistance->giver_name }}
                                    </span>
                                </p>
                            </div>

                            <!-- Manage Button -->
                            <a href="{{ route('social-assistance.manage', $socialAssistance->id) }}"
                                class="flex items-center justify-center gap-2 rounded-2xl py-3 sm:py-4 px-4 sm:px-6 bg-desa-black w-full sm:w-auto">
                                <span class="font-medium text-sm sm:text-base text-white">Manage</span>
                            </a>
                        </div>

                        <!-- Divider -->
                        <hr class="border-desa-background">

                        <!-- Stats Grid - Mobile Single Column -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                            <!-- Amount -->
                            <div
                                class="flex items-center gap-3 p-2 sm:p-0 rounded-xl sm:rounded-none bg-gray-50 sm:bg-transparent">
                                <div
                                    class="flex size-10 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow shrink-0">
                                    <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg"
                                        class="size-5 sm:size-6" alt="icon">
                                </div>
                                <div class="flex flex-col gap-0.5 sm:gap-1 min-w-0">
                                    <p class="font-semibold text-base sm:text-lg leading-5 text-desa-dark-green truncate">
                                        {{ $socialAssistance->amount ?? '-' }}
                                    </p>
                                    <p class="font-medium text-xs sm:text-sm text-desa-secondary truncate">
                                        {{ $socialAssistance->category ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Date -->
                            <div
                                class="flex items-center gap-3 p-2 sm:p-0 rounded-xl sm:rounded-none bg-gray-50 sm:bg-transparent">
                                <div
                                    class="flex size-10 sm:size-[52px] rounded-2xl items-center justify-center bg-desa-foreshadow shrink-0">
                                    <img src="{{ asset('assets/images/icons/calendar-2-dark-green.svg') }}"
                                        class="size-5 sm:size-6" alt="icon">
                                </div>
                                <div class="flex flex-col gap-0.5 sm:gap-1 min-w-0">
                                    <p class="font-semibold text-sm sm:text-lg text-desa-dark-green truncate">
                                        {{ $socialAssistance->date ? \Carbon\Carbon::parse($socialAssistance->date)->translatedFormat('l, d M Y') : '-' }}
                                    </p>
                                    <p class="font-medium text-xs sm:text-sm text-desa-secondary">Tanggal Pelaksanaan</p>
                                </div>
                            </div>

                            <!-- Status -->
                            <div
                                class="flex items-center gap-3 p-2 sm:p-0 rounded-xl sm:rounded-none bg-gray-50 sm:bg-transparent group">
                                <div
                                    class="flex size-10 sm:size-[52px] rounded-2xl items-center justify-center overflow-hidden shrink-0
                                    {{ $socialAssistance->availability == 'Tersedia'
                                        ? 'bg-green-100 group-hover:bg-green-500'
                                        : 'bg-red-100 group-hover:bg-red-500' }}">
                                    <img src="{{ $socialAssistance->availability == 'Tersedia'
                                        ? asset('/assets/images/icons/check-square-green.svg')
                                        : asset('/assets/images/icons/minus-square-red.svg') }}"
                                        class="flex size-5 sm:size-6 shrink-0" alt="icon">
                                </div>
                                <div class="flex flex-col gap-0.5 sm:gap-1 min-w-0">
                                    <p
                                        class="font-semibold text-base sm:text-lg leading-5 transition-colors duration-300 truncate
                                        {{ $socialAssistance->availability == 'Tersedia'
                                            ? 'text-green-600 group-hover:text-white'
                                            : 'text-red-600 group-hover:text-white' }}">
                                        {{ $socialAssistance->availability }}
                                    </p>
                                    <p class="font-medium text-xs sm:text-sm text-desa-secondary">Status Bansos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-desa-secondary text-sm sm:text-base">Belum ada bantuan sosial.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Pagination - Mobile Optimized -->
        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
            <div class="text-sm text-gray-700">
                Menampilkan <span id="showingStart">{{ $socialAssistances->firstItem() }}</span> sampai <span
                    id="showingEnd">{{ $socialAssistances->lastItem() }}</span> dari <span id="totalRows">{{ $socialAssistances->total() }}</span>
                data
            </div>
            <div id="pagination">
                {{ $socialAssistances->links() }}
            </div>
        </div>
    </div>
@endsection
