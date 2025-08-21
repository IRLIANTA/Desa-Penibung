@if ($paginator->hasPages())
    <nav id="Pagination">
        <ul class="flex items-center gap-3">
            {{-- Tombol Previous --}}
            <li class="group">
                @if ($paginator->onFirstPage())
                    {{-- Tombol Disabled saat di halaman pertama --}}
                    <button type="button" disabled
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow disabled:!bg-desa-foreshadow transition-setup">
                        <img src="{{ asset('assets/') }}/images/icons/disabled-arrow-pagination.svg"
                            class="flex size-6 shrink-0" alt="icon">
                    </button>
                @else
                    {{-- Tombol Aktif dengan link ke halaman sebelumnya --}}
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green transition-setup">
                        <img src="{{ asset('assets/') }}/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 group-hover:hidden" alt="icon">
                        <img src="{{ asset('assets/') }}/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 group-hover:flex" alt="icon">
                    </a>
                @endif
            </li>

            {{-- Looping untuk Nomor Halaman --}}
            @foreach ($elements as $element)
                {{-- Handle separator "..." --}}
                @if (is_string($element))
                    <li class="group">
                        <span class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow">
                            <span class="text-desa-dark-green font-semibold">{{ $element }}</span>
                        </span>
                    </li>
                @endif

                {{-- Handle link halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Cek halaman aktif untuk menambahkan class 'active' --}}
                        <li class="group @if ($page == $paginator->currentPage()) active @endif">
                            <a href="{{ $url }}"
                                class="flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green group-[.active]:bg-desa-dark-green transition-setup">
                                <span
                                    class="text-desa-dark-green font-semibold group-[.active]:text-desa-foreshadow group-hover:text-desa-foreshadow transition-setup">
                                    {{ $page }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            <li class="group">
                @if ($paginator->hasMorePages())
                    {{-- Tombol Aktif dengan link ke halaman selanjutnya --}}
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow group-hover:bg-desa-dark-green transition-setup">
                        <img src="{{ asset('assets/') }}/images/icons/arrow-left-dark-green.svg"
                            class="flex size-6 shrink-0 rotate-180 group-hover:hidden" alt="icon">
                        <img src="{{ asset('assets/') }}/images/icons/arrow-left-foreshadow.svg"
                            class="hidden size-6 shrink-0 rotate-180 group-hover:flex" alt="icon">
                    </a>
                @else
                    {{-- Tombol Disabled saat di halaman terakhir --}}
                    <button type="button" disabled
                        class="group/arrow flex size-11 shrink-0 items-center justify-center rounded-full bg-desa-foreshadow disabled:!bg-desa-foreshadow transition-setup">
                        <img src="{{ asset('assets/') }}/images/icons/disabled-arrow-pagination.svg"
                            class="flex size-6 shrink-0 rotate-180" alt="icon">
                    </button>
                @endif
            </li>
        </ul>
    </nav>
@endif