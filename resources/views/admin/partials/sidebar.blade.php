{{-- <!-- Overlay (di luar sidebar) -->
<div id="SidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

<aside id="Sidebar"
  class=" fixed top-0 h-full  left-0 z-50 w-[280px] h-screen bg-white border-r border-desa-foreshadow transform -translate-x-full transition-transform duration-300 lg:relative lg:translate-x-0" style="height: -webkit-fill-available">
  <div class="fixed top-0  w-[260px] flex shrink-0 flex-1 z-20 bg-white">
    <div class="flex flex-col h-full w-full gap-6 pt-[30px] px-6">
      <div class="flex items-center justify-between">
        <img src="{{ asset('assets/') }}/images/logos/logo-text.svg" class="flex h-[60px] shrink-0" alt="logo">

        <!-- Tombol toggle di dalam sidebar (biar tetap ada). ID beda agar tidak bentrok -->
        
      </div>

      <div class="flex flex-col flex-1 gap-6 overflow-y-scroll hide-scrollbar">
        <nav class="flex flex-col gap-2 pb-12">
          <p class="font-medium text-sm text-desa-secondary">Main Menu</p>

          <ul>
            <li class="group {{ request()->is('/', 'profile', 'profile/*') ? 'active' : '' }}">
              <a href="/profile"
                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                <div class="relative flex size-6 shrink-0">
                  <img src="{{ asset('assets/') }}/images/icons/building-4-dark-green.svg"
                    class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                    alt="icon">
                  <img src="{{ asset('assets/') }}/images/icons/building-4-secondary-green.svg"
                    class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                    alt="icon">
                </div>
                <span
                  class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                  Profile Desa
                </span>
              </a>
            </li>
          </ul>

          <ul>
            <li class="group {{ request()->is('dashboard', 'dashboard/*') ? 'active' : '' }}">
              <a href="/dashboard"
                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                <div class="relative flex size-6 shrink-0">
                  <img src="{{ asset('assets/') }}/images/icons/chart-square-dark-green.svg"
                    class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                    alt="icon">
                  <img src="{{ asset('assets/') }}/images/icons/chart-square-secondary-green.svg"
                    class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                    alt="icon">
                </div>
                <span
                  class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                  Dashboard
                </span>
              </a>
            </li>
          </ul>

          <!-- Bantuan Sosial -->
          <ul>
            <li class="group {{ request()->is('social-assistance', 'social-assistance/*') ? 'active' : '' }}">
              <a href="{{ route('social-assistance.index') }}"
                class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                <div class="relative flex size-6 shrink-0">
                  <img src="{{ asset('assets/') }}/images/icons/heart.svg" class="flex size-6 shrink-0" alt="icon">
                </div>
                <span
                  class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                  Bantuan Sosial
                </span>
              </a>
            </li>
          </ul>

          <!-- Pembangunan -->
          <ul>
            <li class="group {{ request()->is('development', 'development/*') ? 'active' : '' }}">
              <a href="{{ route('development.index') }}"
                class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                <div class="relative flex size-6 shrink-0">
                  <img src="{{ asset('assets/') }}/images/icons/building.svg" class="flex size-6 shrink-0" alt="icon">
                </div>
                <span
                  class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                  Pembangunan
                </span>
              </a>
            </li>
          </ul>

          <!-- Events Desa -->
          <ul>
            <li class="group {{ request()->is('event', 'event/*') ? 'active' : '' }}">
              <a href="{{ route('event.index') }}"
                class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                <div class="relative flex size-6 shrink-0">
                  <img src="{{ asset('assets/') }}/images/icons/calendar-2-dark-green.svg" class="flex size-6 shrink-0"
                    alt="icon">
                </div>
                <span
                  class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                  Events Desa
                </span>
              </a>
            </li>
          </ul>

          @if (auth()->check())
            <ul>
              <li class="group {{ request()->is('feedback', 'feedback/*') ? 'active' : '' }}">
                <a href="{{ route('feedback.user') }}"
                  class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                  <div class="relative flex size-6 shrink-0">
                    <img src="{{ asset('assets/') }}/images/icons/chat-bubble.svg" class="flex size-6 shrink-0"
                      alt="icon">
                  </div>
                  <span
                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                    Feedback User
                  </span>
                </a>
              </li>
            </ul>
          @else
            <ul>
              <li class="group {{ request()->is('feedback', 'feedback/*') ? 'active' : '' }}">
                <a href="{{ route('feedback.index') }}"
                  class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                  <div class="relative flex size-6 shrink-0">
                    <img src="{{ asset('assets/') }}/images/icons/chat.svg" class="flex size-6 shrink-0" alt="icon">
                  </div>
                  <span
                    class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                    Feedback
                  </span>
                </a>
              </li>
            </ul>
          @endif

          @if (auth()->check())
            <ul>
              <li class="group ">
                <a href="{{ route('event.index') }}" class="flex items-center h-14 gap-2 rounded-2xl p-4">
                  <div class="relative flex size-6 shrink-0">
                    <img src="{{ asset('assets/') }}/images/icons/logout-red.svg" class="flex size-6 shrink-0"
                      alt="icon">
                  </div>
                  <span class="text-left leading-5 text-desa-red flex flex-1 hover:text-desa-dark-red transition-setup">
                    Logout
                  </span>
                </a>
              </li>
            </ul>
          @endif
        </nav>
      </div>
    </div>
  </div>
</aside>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sidebar  = document.getElementById('Sidebar');
    const overlay  = document.getElementById('SidebarOverlay');
    const btnNav   = document.getElementById('SidebarToggle');        // tombol di navbar
    const btnInside= document.getElementById('SidebarToggleInside');  // tombol di dalam sidebar

    function toggleSidebar() {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }
    function closeSidebar() {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    }

    if (btnNav)    btnNav.addEventListener('click', toggleSidebar);
    if (btnInside) btnInside.addEventListener('click', toggleSidebar);
    if (overlay)   overlay.addEventListener('click', closeSidebar);
  });
</script>
@endpush --}}
<div class="-translate-x-full lg:translate-x-0 bg-black/15 transition-all fixed z-20 h-dvh w-screen lg:w-[300px]">
    <div
        class="bg-white z-10 p-6 lg:py-[30px] h-full  overflow-y-auto no-scrollbar scroll ml-auto w-[100vw] lg:w-[300px] gap-6 flex flex-col">
        <div class="top">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <img src="/icons/logo.svg" alt="" />
                    <h1 class="text-2xl font-bold leading-normal text-black">
                        DesaKita.
                    </h1>
                </div>
                <button id="toggle-sidebar" class="w-11 rounded-2xl border border-bg-color p-1.5">
                    <img src="/icons/menu.svg" alt="" />
                </button>
            </div>
        </div>

        <div class="main-menu flex flex-col gap-2">
            <h2 class="text-sm font-medium leading-normal text-secondary-text-color">
                Main Menu
            </h2>

            <ul>
                <li class="group {{ request()->is('dashboard', 'dashboard/*') ? 'active' : '' }}">
                    <a href="/dashboard"
                        class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                        <div class="relative flex size-6 shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/chart-square-dark-green.svg"
                                class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                                alt="icon">
                            <img src="{{ asset('assets/') }}/images/icons/chart-square-secondary-green.svg"
                                class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                                alt="icon">
                        </div>
                        <span
                            class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                            Dashboard
                        </span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="group {{ request()->is('/', 'profile', 'profile/*') ? 'active' : '' }}">
                    <a href="/profile"
                        class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                        <div class="relative flex size-6 shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/building-4-dark-green.svg"
                                class="absolute flex size-6 shrink-0 opacity-0 group-hover:opacity-100 group-[.active]:opacity-100 transition-setup"
                                alt="icon">
                            <img src="{{ asset('assets/') }}/images/icons/building-4-secondary-green.svg"
                                class="absolute flex size-6 shrink-0 opacity-100 group-hover:opacity-0 group-[.active]:opacity-0 transition-setup"
                                alt="icon">
                        </div>
                        <span
                            class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                            Profile Desa
                        </span>
                    </a>
                </li>
            </ul>

            <ul>
                <li class="group {{ request()->is('social-assistance', 'social-assistance/*') ? 'active' : '' }}">
                    <a href="{{ route('social-assistance.index') }}"
                        class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                        <div class="relative flex size-6 shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/heart.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <span
                            class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                            Bantuan Sosial
                        </span>
                    </a>
                </li>
            </ul>

            <ul>
                <li class="group {{ request()->is('development', 'development/*') ? 'active' : '' }}">
                    <a href="{{ route('development.index') }}"
                        class="flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                        <div class="relative flex size-6 shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/building.svg" class="flex size-6 shrink-0"
                                alt="icon">
                        </div>
                        <span
                            class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                            Pembangunan
                        </span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="group {{ request()->is('event', 'event/*') ? 'active' : '' }}">
                    <a href="{{ route('event.index') }}"
                        class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                        <div class="relative flex size-6 shrink-0">
                            <img src="{{ asset('assets/') }}/images/icons/calendar-2-dark-green.svg"
                                class="flex size-6 shrink-0" alt="icon">
                        </div>
                        <span
                            class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                            Events Desa
                        </span>
                    </a>
                </li>
            </ul>
            @if (auth()->check())
                <ul>
                    <li class="group {{ request()->is('feedback', 'feedback/*') ? 'active' : '' }}">
                        <a href="{{ route('feedback.user') }}"
                            class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                            <div class="relative flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/chat-bubble.svg"
                                    class="flex size-6 shrink-0" alt="icon">
                            </div>
                            <span
                                class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                Feedback User
                            </span>
                        </a>
                    </li>
                </ul>
            @else
                <ul>
                    <li class="group {{ request()->is('feedback', 'feedback/*') ? 'active' : '' }}">
                        <a href="{{ route('feedback.index') }}"
                            class=" flex items-center h-14 gap-2 rounded-2xl p-4 group-hover:bg-desa-foreshadow group-[.active]:bg-desa-foreshadow transition-setup">
                            <div class="relative flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/chat.svg" class="flex size-6 shrink-0"
                                    alt="icon">
                            </div>
                            <span
                                class="text-left leading-5 text-desa-secondary flex flex-1 group-hover:text-desa-dark-green group-[.active]:text-desa-dark-green group-[.active]:font-medium transition-setup">
                                Feedback
                            </span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->check())
                <ul>
                    <li class="group ">
                        <a href="{{ route('event.index') }}" class="flex items-center h-14 gap-2 rounded-2xl p-4">
                            <div class="relative flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/logout-red.svg"
                                    class="flex size-6 shrink-0" alt="icon">
                            </div>
                            <span
                                class="text-left leading-5 text-desa-red flex flex-1 hover:text-desa-dark-red transition-setup">
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
    
</div>
