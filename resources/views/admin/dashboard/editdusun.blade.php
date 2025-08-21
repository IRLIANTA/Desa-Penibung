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
                    @forelse($dusun as $index => $item)
                        <tr id="row-{{ $index }}">
                            <td class="border px-4 py-2">
                                <span class="text">{{ $item->dusun }}</span>
                                <input type="text" class="hidden w-full border rounded p-1" value="{{ $item->dusun }}">
                            </td>
                            <td class="border px-4 py-2">
                                <span class="text">{{ $item->nama_kepala_dusun }}</span>
                                <input type="text" class="hidden w-full border rounded p-1"
                                    value="{{ $item->nama_kepala_dusun }}">
                            </td>
                            <td class="border px-4 py-2">
                                <span class="text">{{ $item->jml_rt }}</span>
                                <input type="number" class="hidden w-full border rounded p-1" value="{{ $item->jml_rt }}">
                            </td>
                            <td class="border px-4 py-2">
                                <span class="text">{{ $item->jml_rw }}</span>
                                <input type="number" class="hidden w-full border rounded p-1" value="{{ $item->jml_rw }}">
                            </td>
                            <td class="border px-4 py-2 text-center flex items-center justify-center gap-3">
                                <button type="button" onclick="editRow({{ $index }})"
                                    class="text-blue-600 hover:text-blue-800">
                                    <img src="{{ asset('assets/images/icons/edit-secondary-green.svg') }}" alt="Edit"
                                        class="w-5 h-5">
                                </button>
                                <button type="button" onclick="saveRow({{ $index }}, {{ $item->id }})"
                                    class="hidden text-green-600 hover:text-green-800 save-btn">
                                    <img src="{{ asset('assets/images/icons/check.svg') }}" alt="Edit" class="w-5 h-5">
                                </button>
                                <button data-modal="Modal-DeleteDusun" data-id="{{ $item->id }}"
                                    class="text-red-600 hover:text-red-800">
                                    <img src="{{ asset('assets/images/icons/trash-red.svg') }}" alt="Hapus"
                                        class="w-5 h-5">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data dusun</td>
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
                                <input type="text" placeholder="Masukan nama kepala dusun" name="nama_kepala_dusun[]"
                                    required
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
                <button type="reset">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal, Tidak jadi
                    </div>
                </button>
                <button id="submitButton" type="submit"
                    class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">
                    Simpan
                </button>
            </section>
        </form>
    </div>
    <div id="Modal-DeleteDusun" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert" class="flex flex-col w-[335px] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 gap-3 bg-desa-black">
                <p class="font-medium leading-5 text-white">Hapus Data Dusun?</p>
                <button class="btn-close-modal">
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0"
                        alt="icon">
                </button>
            </div>
            <div class="flex flex-col p-4 gap-3">
                <p class="font-medium text-sm leading-[22.5px] text-desa-secondary">
                    Tindakan ini permanen dan tidak bisa dibatalkan!
                </p>
                <hr class="border-desa-background">
                <div class="flex items-center gap-3">
                    <button type="button"
                        class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                        <span class="font-semibold text-sm">Batal</span>
                    </button>
                    <form action="" id="eventDelete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-red w-full">
                            <img src="{{ asset('/assets/images/icons/trash-white.svg') }}" class="flex size-6 shrink-0"
                                alt="">
                            <span class="font-semibold text-sm text-white">Iya Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById("Modal-DeleteDusun");
                const formDelete = document.getElementById("eventDelete");

                document.querySelectorAll("[data-modal='Modal-DeleteDusun']").forEach(btn => {
                    btn.addEventListener("click", function() {
                        const id = this.getAttribute("data-id");
                        const url = "{{ route('dashboard.deletedusun', ':id') }}".replace(":id", id);

                        formDelete.setAttribute("action", url);

                        modal.classList.remove("hidden");
                        document.body.classList.add("overflow-hidden");
                    });
                });

                document.querySelectorAll(".btn-close-modal").forEach(btn => {
                    btn.addEventListener("click", function() {
                        modal.classList.add("hidden");
                        document.body.classList.remove("overflow-hidden");
                    });
                });

                modal.addEventListener("click", function(event) {
                    if (event.target === modal) {
                        modal.classList.add("hidden");
                        document.body.classList.remove("overflow-hidden");
                    }
                });
            });
        </script>

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


        <script>
            function editRow(index) {
                const row = document.getElementById(`row-${index}`);
                row.querySelectorAll("span.text").forEach(el => el.classList.add("hidden"));
                row.querySelectorAll("input").forEach(el => el.classList.remove("hidden"));
                row.querySelector(".save-btn").classList.remove("hidden");
            }

            function saveRow(index, id) {
                const row = document.getElementById(`row-${index}`);
                const inputs = row.querySelectorAll("input");

                const data = {
                    dusun: inputs[0].value,
                    nama_kepala_dusun: inputs[1].value,
                    jml_rt: inputs[2].value,
                    jml_rw: inputs[3].value,
                    _token: "{{ csrf_token() }}"
                };

                fetch(`/dashboard/updatedusun/${id}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    }).then(res => res.json())
                    .then(response => {
                        row.querySelectorAll("span.text")[0].innerText = data.dusun;
                        row.querySelectorAll("span.text")[1].innerText = data.nama_kepala_dusun;
                        row.querySelectorAll("span.text")[2].innerText = data.jml_rt;
                        row.querySelectorAll("span.text")[3].innerText = data.jml_rw;

                        row.querySelectorAll("span.text").forEach(el => el.classList.remove("hidden"));
                        row.querySelectorAll("input").forEach(el => el.classList.add("hidden"));
                        row.querySelector(".save-btn").classList.add("hidden");

                        Toast.success('Berhasil Update Dusun')
                    });
            }
        </script>
    @endpush
@endsection
