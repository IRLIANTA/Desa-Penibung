@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        {{-- form detail --}}
        @if ($dusun)
            <div id="Header" class="flex items-center justify-between">
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold text-2xl">Detail Dusun</h1>
                </div>
            </div>
            <table class="min-w-full border border-desa-background bg-white rounded-2xl overflow-hidden">
                <thead class="bg-desa-dark-green text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama Dusun</th>
                        <th class="px-4 py-3 text-left">Nama Kepala Dusun</th>
                        <th class="px-4 py-3 text-left">Jumlah RT</th>
                        <th class="px-4 py-3 text-left">Jumlah RW</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dusun as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->dusun }}</td>
                            <td class="border px-4 py-2">{{ $item->nama_kepala_dusun }}</td>
                            <td class="border px-4 py-2 ">{{ number_format($item->jml_rt, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2 ">{{ number_format($item->jml_rw, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2 text-center flex items-center justify-center gap-3">
                                <a href="{{ route('dashboard.editdusun', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <img src="{{ asset('assets/images/icons/edit-secondary-green.svg') }}" alt="Edit"
                                        class="w-5 h-5">
                                </a>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <img src="{{ asset('assets/images/icons/trash-red.svg') }}" alt="Hapus"
                                            class="w-5 h-5">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data dusun</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <hr class="border-desa-background my-6" />
        @endif

        {{-- form tambah --}}
        <div id="Header" class="flex items-center justify-between mt-4">
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Form Tambah Dusun</h1>
            </div>
        </div>
        <form action="{{ route('dashboard.storedusun') }}" id="myForm" method="POST" class="capitalize my-6 ">
            @csrf
            <div id="dusunContainer" class="fle#x flex-col gap-6">
                <div
                    class="dusun-item relative shrink-0 rounded-3xl p-6 mt-4 bg-white flex flex-col gap-6 h-fit border border-desa-background">
                    <button type="button" onclick="removeDusun(this)"
                        style="width: 32px; height: 32px; border-radius: 50%; 
                                background-color: #f87171; color: #fff; 
                                display: flex; align-items: center; justify-content: center; 
                                font-size: 18px; line-height: 1; box-shadow: 0 2px 6px rgba(0,0,0,0.2); 
                                position: absolute; top: -10px; left: -10px; cursor: pointer;">
                        ×
                    </button>
                    <div class="flex items-center justify-between gap-4 py-3">
                        <!-- Input Nama Dusun -->
                        <div class="flex flex-col gap-2 flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Nama Dusun</p>
                            <label class="relative group peer w-full">
                                <input type="text" placeholder="Masukan nama dusun" name="dusun[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background 
                            focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/building-4-secondary-green.svg') }}"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/building-4-black.svg') }}"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>

                        <!-- Input Kepala Dusun -->
                        <div class="flex flex-col gap-2 flex-1 ">
                            <p class="font-medium leading-5 text-desa-secondary">Nama Kepala Dusun</p>
                            <label class="relative group peer w-full">
                                <input type="text" placeholder="Masukan nama kepala dusun" name="nama_kepala_dusun[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background 
                            focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/profile-secondary-green.svg') }}"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/profile-dark-green.svg') }}"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <!-- Input RT -->
                        <div class="flex flex-col gap-2 flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Jumlah RT</p>
                            <label class="relative group peer w-full">
                                <input type="number" placeholder="Masukan Jumlah RT" name="jml_rt[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background 
                            focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>

                        <!-- Input RW -->
                        <div class="flex flex-col gap-2 flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Jumlah RW</p>
                            <label class="relative group peer w-full">
                                <input type="number" placeholder="Masukan Jumlah RW" name="jml_rw[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background 
                            focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <hr class="border-desa-background my-6" />
            </div>

            <!-- Tombol tambah -->
            <div class="flex justify-end" style="margin: 20px 0 60px 0;">
                <button type="button" onclick="addDusun()"
                    class="py-3 px-6 rounded-full bg-desa-yellow text-black font-medium 
               shadow-md hover:bg-desa-yellow transition">
                    + Tambah Dusun
                </button>
            </div>


            <hr class="border-desa-background my-6" />

            <section id="Buttons" class="flex items-center justify-end gap-4">
                <a href="kd-event-desa.html">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal, Tidak jadi
                    </div>
                </a>
                <button disabled id="submitButton" type="submit"
                    class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">
                    Simpan
                </button>
            </section>
        </form>
    </div>

    @push('scripts')
        {{-- fungsi repeater --}}
        <script>
            function addDusun() {
                let container = document.getElementById("dusunContainer");
                let firstDusun = container.querySelector(".dusun-item");
                let clone = firstDusun.cloneNode(true);

                clone.querySelectorAll("input").forEach(input => input.value = "");

                container.appendChild(clone);
                updateRemoveButtons();
            }

            function removeDusun(btn) {
                let container = document.getElementById("dusunContainer");
                if (container.querySelectorAll(".dusun-item").length > 1) {
                    btn.parentElement.remove();
                    updateRemoveButtons();
                }
            }

            function updateRemoveButtons() {
                let container = document.getElementById("dusunContainer");
                let items = container.querySelectorAll(".dusun-item");
                items.forEach((item) => {
                    let btn = item.querySelector(".remove-btn");
                    btn.disabled = items.length === 1;
                    btn.style.opacity = items.length === 1 ? "0.5" : "1";
                    btn.style.cursor = items.length === 1 ? "not-allowed" : "pointer";
                });
            }

            updateRemoveButtons();
        </script>
    @endpush
@endsection
