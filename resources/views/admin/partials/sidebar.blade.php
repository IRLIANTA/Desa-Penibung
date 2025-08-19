<aside id="Sidebar"
    class="relative flex w-[280px] shrink-0 min-h-screen bg-white border-r border-desa-foreshadow overflow-hidden">
    <div class="fixed top-0 h-full w-[280px] flex shrink-0 flex-1 z-20 bg-white">
        <div class="flex flex-col h-full w-full gap-6 pt-[30px] px-6">
            <div class="flex items-center justify-between"> <img src="{{ asset('assets/') }}/images/logos/logo-text.svg"
                    class="flex h-[30px] shrink-0" alt="logo"> <button
                    class="flex size-11 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
                    <img src="{{ asset('assets/') }}/images/icons/menu-secondary-green.svg" class="size-6"
                        alt="icon"> </button> </div>
            <div class="flex flex-col flex-1 gap-6 overflow-y-scroll hide-scrollbar">
                <nav class="flex flex-col gap-2 pb-12">
                    <p class="font-medium text-sm text-desa-secondary">Main Menu</p>
                    @auth
                            
                    <ul>
                        <li class="group {{ request()->is('dashboard') ? 'active' : '' }}"> <a href="/dashboard"
                                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/chart-square-dark-green.svg"
                                        class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                                        alt="icon"> <img
                                        src="{{ asset('assets/') }}/images/icons/chart-square-secondary-green.svg"
                                        class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                                        alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                    Dashboard </span>
                            </a> </li>
                    </ul> <!-- Bantuan Sosial -->
                    @endauth

                    <ul>
                        <li class="group {{ request()->is('/') ? 'active' : '' }}"> <a href="{{ route('profile.index') }}"
                                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/building-4-dark-green.svg"
                                        class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                                        alt="icon"> <img
                                        src="{{ asset('assets/') }}/images/icons/building-4-secondary-green.svg"
                                        class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                                        alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                    Profile Desa </span>
                            </a> </li>
                    </ul>
                    
                    <ul>
                        <li class="group {{ request()->is('social-assistance','social-assistance/*') ? 'active' : '' }}"> <a href="{{ route('social-assistance.index') }}"
                                class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/bag-2-dark-green.svg"
                                        class="flex size-6 shrink-0" alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                    Bantuan Sosial </span>
                            </a> </li>
                    </ul> <!-- Pembangunan -->
                    <ul>
                        <li class="group {{ request()->is('development','development/*') ? 'active' : '' }}"> <a href="{{ route('development.index') }}"
                                class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/bag-2-dark-green.svg"
                                        class="flex size-6 shrink-0" alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                    Pembangunan </span>
                            </a> </li>
                    </ul> <!-- Events Desa -->
                    <ul>
                        <li class="group {{ request()->is('event','event/*') ? 'active' : '' }}"> <a href="{{ route('event.index') }}"
                                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/bag-2-dark-green.svg"
                                        class="flex size-6 shrink-0" alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                    Events Desa </span>
                            </a> </li>
                    </ul>
                     @if (auth()->check())

                    <ul>
                        <li class="group "> <a href="{{ route('event.index') }}"
                                class="flex items-center h-14 gap-2 rounded-2xl p-4">
                                <div class="relative flex size-6 shrink-0"> <img
                                        src="{{ asset('assets/') }}/images/icons/logout-red.svg"
                                        class="flex size-6 shrink-0" alt="icon"> </div> <span
                                    class="text-left leading-5 text-desa-red flex flex-1 hover:text-desa-dark-red transition-setup">
                                    Logout </span>
                            </a> </li>
                    </ul>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</aside>
