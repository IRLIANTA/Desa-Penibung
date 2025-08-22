<div id="Top-Bar" class="relative flex h-[116px] shrink-0">
  <div
    class="fixed top-0 flex items-center w-[-webkit-fill-available] h-[116px] py-[30px] px-6 gap-4 bg-white z-30 border-l border-desa-background">
    <!-- Tombol toggle sidebar di kiri search -->
    <button id="SidebarToggle"
      class="lg:hidden flex size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
      <img src="{{ asset('assets/') }}/images/icons/menu-secondary-green.svg" class="size-6" alt="menu">
    </button>

    <form action="kd-search-result.html" class="flex w-full">
      <label
        class="group flex w-full items-center rounded-full border border-desa-background py-4 px-6 gap-2 bg-white hover:border-desa-dark-green focus-within:border-desa-dark-green transition-setup">
        <button type="submit" class="relative flex size-6 shrink-0">
          <img src="{{ asset('assets/') }}/images/icons/search-normal-dark-green.svg"
            class="absolute flex size-6 shrink-0 opacity-0 group-focus-within:opacity-100 transition-setup" alt="icon">
          <img src="{{ asset('assets/') }}/images/icons/search-normal-secondary-green.svg"
            class="absolute flex size-6 shrink-0 opacity-100 group-focus-within:opacity-0 transition-setup" alt="icon">
        </button>
        <input type="text"
          class="w-full appearance-none outline-none font-medium leading-5 text-desa-black placeholder:placeholder-shown:text-desa-secondary"
          placeholder="Terlusuri lebih lanjut">
      </label>
    </form>

    @if(auth()->check())
      <a href="#"
        class="flex size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
        <img src="{{ asset('assets/') }}/images/icons/notification-secondary-green.svg" class="size-6" alt="icon">
      </a>
      <a href="#"
        class="flex size-14 shrink-0 items-center justify-center rounded-2xl border border-desa-background hover:border-desa-secondary transition-setup">
        <img src="{{ asset('assets/') }}/images/icons/setting-2-secondary-green.svg" class="size-6" alt="icon">
      </a>
      <div class="flex items-center gap-4">
        <div class="flex size-14 shrink-0 rounded-full overflow-hidden bg-desa-foreshadow">
          <img src="{{ asset('assets/') }}/images/photos/kk-preview.png" class="w-full h-full object-cover" alt="photo">
        </div>
        <div class="flex flex-col gap-[6px] w-[120px] shrink-0">
          <p class="font-semibold leading-5 w-[120px] truncate">Admin</p>
          <p class="font-medium text-sm text-desa-secondary">Desa Penibung</p>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit" class="flex size-6 shrink-0 p-0 border-0 bg-transparent">
            <img src="{{ asset('assets/images/icons/logout-red.svg') }}" class="size-6" alt="logout">
          </button>
        </form>
      </div>
    @endif
  </div>
</div>
