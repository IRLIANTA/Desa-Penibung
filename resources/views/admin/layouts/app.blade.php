<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desa Digital</title>
    <meta name="description" content="The simple way to manage your citizens">
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/customtoast.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-icon.png') }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="The simple way to manage your citizens">
    <meta property="og:description" content="The simple way to manage your citizens">
    <meta property="og:image" content="https://desa-digital.netlify.app/assets/images/logos/logo-icon.png">
    <meta property="og:url" content="https://desa-digital.netlify.app">
    <meta property="og:type" content="website">
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body>
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2 max-w-sm w-full toast-container">
        <!-- Toasts akan ditambahkan di sini -->
    </div>
    <div class="flex flex-1">
        @include('admin.partials.sidebar')
        <div id="Main-Container" class="flex flex-col flex-1 ">
            @include('admin.partials.navbar')
            @yield('content')
        </div>
    </div>
    <section style="z-index:99;">
   <footer class="bg-[#34613A] text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-6 hidden md:grid grid-cols-1 md:grid-cols-3 gap-8 justify-center items-start">
            <div class="flex flex-col sm:flex-row items-start justify-start gap-4"><img alt="Logo Mempawah"
                    loading="lazy" width="160" height="160" decoding="async" data-nimg="1"
                    class="object-contain mr-4" style="color:transparent"
                  
                    src="{{ asset('assets/') }}/images/logos/logo-icon.png">
                <div class="text-sm leading-relaxed text-center sm:text-left">
                    <p class="font-semibold text-base">Pemerintah Desa Penibung</p>
                    <p>Kec. Mempawah Hilir, Kab. Mempawah</p>
                    <p>Provinsi Kalimantan Barat, 78919</p>
                </div>
            </div>
            <div class="flex flex-col items-center space-y-2 text-center">
                <h4 class="text-lg font-semibold">Jelajahi:</h4><a href="https://mempawahkab.go.id/"
                    class="hover:underline text-lg flex items-center justify-center" target="_blank"
                    rel="noopener noreferrer"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                        viewBox="0 0 448 512" class="mr-2" height="20" width="20">
                    </svg> mempawahkab.go.id</a>
            </div>
            <div class="flex flex-col items-center space-y-2 text-center">
                <h4 class="text-lg font-semibold">Follow Kami:</h4>
                <a href="https://www.instagram.com/penibunginformasi_official?igsh=MWFwZHhxY2g5dTJ3MQ=="
                    class="hover:underline text-lg" target="_blank"
                    rel="noopener noreferrer">Instagram</a>
                <a href="https://www.facebook.com/share/1YsQnHJhYs/?mibextid=wwXIfr"
                    class="hover:underline text-lg" target="_blank" rel="noopener noreferrer">Facebook</a>
                <a
                    href="https://www.tiktok.com/@penibunginformasi_ofc?_t=ZS-8z5iWqZ4F9Q&_r=1" class="hover:underline text-lg" target="_blank"
                    rel="noopener noreferrer">Tiktok</a>
            </div>
        </div>
        <div class="md:hidden max-w-7xl mx-auto px-6 flex flex-col gap-6">
            <div class="flex items-start gap-4"><img alt="Logo Mempawah" loading="lazy" width="64" height="64"
                    decoding="async" data-nimg="1" class="object-contain" style="color:transparent"
                    src="{{ asset('assets/') }}/images/logos/logo-icon.png">
                <div class="text-sm leading-relaxed">
                    <p class="font-semibold text-base">Pemerintah Penibung</p>
                    <p>Kec. Mempawah Hilir, Kab. Mempawah</p>
                    <p>Provinsi Kalimantan Barat, 78919</p>
                </div>
            </div>
            <details class="bg-white/10 rounded-xl p-4 open:shadow-sm">
                <summary class="cursor-pointer text-lg font-semibold list-none flex items-center justify-between">
                    <span>Jelajahi</span><span class="ml-3 inline-block">▾</span></summary>
                <div class="mt-3 border-t border-white/20 pt-3"><a href="https://mempawahkab.go.id/"
                        class="text-base flex items-center justify-start hover:underline" target="_blank"
                        rel="noopener noreferrer"> mempawahkab.go.id</a></div>
            </details>
            <details class="bg-white/10 rounded-xl p-4 open:shadow-sm">
                <summary class="cursor-pointer text-lg font-semibold list-none flex items-center justify-between">
                    <span>Ikuti Kami</span><span class="ml-3 inline-block">▾</span></summary>
                <ul class="mt-3 space-y-2 border-t border-white/20 pt-3 text-base">
                    <li><a href="https://www.instagram.com/penibunginformasi_official?igsh=MWFwZHhxY2g5dTJ3MQ==" class="hover:underline" target="_blank"
                            rel="noopener noreferrer">Instagram</a></li>
                    <li><a href="https://www.facebook.com/share/1YsQnHJhYs/?mibextid=wwXIfr" class="hover:underline" target="_blank"
                            rel="noopener noreferrer">Facebook</a></li>
                    <li><a href="https://www.tiktok.com/@penibunginformasi_ofc?_t=ZS-8z5iWqZ4F9Q&_r=1" class="hover:underline" target="_blank"
                            rel="noopener noreferrer">Tiktok</a></li>
                </ul>
            </details>
        </div>
        <div class="border-t border-white/30 mt-10 pt-4 text-center text-sm text-white">© 2025 Powered by KKU KLP 07
            Desa Pebibung - Universitas Muhammadiyah Pontianak</div>
    </footer> 
    </section>
 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/') }}/js/accordion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/') }}/js/statistik-penduduk.js"></script>
    <script src="{{ asset('assets/') }}/js/accordion.js"></script>
    <script src="{{ asset('assets/') }}/js/tab-content.js"></script>
    <script src="{{ asset('assets/') }}/js/modal.js"></script>
    <script src="{{ asset('assets/') }}/js/modal-gallery.js"></script>
    <script src="{{ asset('assets/') }}/js/submit-form.js"></script>
    <script src="{{ asset('assets/') }}/js/multiple-image-input.js"></script>
    <script src="{{ asset('assets/') }}/js/customtoast.js"></script>
    @stack('scripts')
    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Toast.success("{{ session('success') }}")

            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Toast.danger("{{ session('error') }}")

            });
        </script>
    @endif
    @if (session()->has('info'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Toast.info("{{ session('info') }}")

            });
        </script>
    @endif
    @if (session()->has('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Toast.warning("{{ session('warning') }}")

            });
        </script>
    @endif
</body>


</html>
