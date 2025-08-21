<div id="Top-Bar" class="relative flex shrink-0">
    <div
        class="fixed top-0 flex items-center w-full h-[70px] sm:h-[80px] md:h-[100px] lg:h-[116px] 
           py-3 sm:py-4 md:py-6 lg:py-[30px] px-4 sm:px-6 gap-4 
           bg-white z-30 border-l border-desa-background">

        <!-- Tombol toggle sidebar di kiri search -->
        <button id="SidebarToggle"
            class="lg:hidden flex size-12 sm:size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
            <img src="{{ asset('assets/') }}/images/icons/menu-secondary-green.svg" class="size-6" alt="menu">
        </button>

        <form action="kd-search-result.html" class="flex w-full max-w-[1000px]">
            <label
                class="group flex w-full items-center rounded-full border border-desa-background py-4 px-6 gap-2 bg-white hover:border-desa-dark-green focus-within:border-desa-dark-green transition-setup">

                <button type="submit" class="relative flex size-6 shrink-0">
                    <img src="{{ asset('/assets') }}/images/icons/search-normal-dark-green.svg"
                        class="absolute flex size-6 shrink-0 opacity-0 group-focus-within:opacity-100 transition-setup"
                        alt="icon">
                    <img src="{{ asset('/assets') }}/images/icons/search-normal-secondary-green.svg"
                        class="absolute flex size-6 shrink-0 opacity-100 group-focus-within:opacity-0 transition-setup"
                        alt="icon">
                </button>

                <input type="text"
                    class="w-full appearance-none outline-none font-medium leading-5 text-desa-black placeholder:placeholder-shown:text-desa-secondary"
                    placeholder="Cari nama penduduk, pengajuan, events, dll">
            </label>
        </form>


        @if (auth()->check())
            <!-- Icon Notification + Setting -->
            <a href="#"
                class="flex size-12 sm:size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
                <img src="{{ asset('assets/') }}/images/icons/notification-secondary-green.svg" class="size-5 sm:size-6"
                    alt="icon">
            </a>
            <a href="#"
                class="flex size-12 sm:size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
                <img src="{{ asset('assets/') }}/images/icons/setting-2-secondary-green.svg" class="size-5 sm:size-6"
                    alt="icon">
            </a>

            <!-- User Profile -->
            <div class="flex items-center gap-3 sm:gap-4">
                <div
                    class="flex size-10 sm:size-12 md:size-14 shrink-0 rounded-full overflow-hidden bg-desa-foreshadow">
                    <img src="{{ asset('assets/') }}/images/photos/kk-preview.png" class="w-full h-full object-cover"
                        alt="photo">
                </div>
                <div class="hidden sm:flex flex-col gap-[2px] sm:gap-[6px] w-[100px] sm:w-[120px] shrink-0">
                    <p class="font-semibold leading-5 w-full truncate">Admin</p>
                    <p class="font-medium text-xs sm:text-sm text-desa-secondary">Desa Penibung</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex size-5 sm:size-6 shrink-0 p-0 border-0 bg-transparent">
                        <img src="{{ asset('assets/images/icons/logout-red.svg') }}" class="size-full" alt="logout">
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
