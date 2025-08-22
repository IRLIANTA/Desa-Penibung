@extends('admin.layouts.app')
@section('content')
    <div class="gap-3 sm:gap-3.5 flex flex-col px-2 sm:px-4">
        @if ($dusun && $dusun->count() > 0)
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold text-2xl">Detail Dusun</h1>
                </div>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="min-w-full border-collapse md:border md:border-desa-background bg-white md:rounded-2xl overflow-hidden">
                    <thead class="bg-desa-dark-green text-white hidden md:table-header-group">
                        <tr>
                            <th class="px-4 py-3 text-left">Nama Dusun</th>
                            <th class="px-4 py-3 text-left">Nama Kepala Dusun</th>
                            <th class="px-4 py-3 text-left">Jumlah RT</th>
                            <th class="px-4 py-3 text-left">Jumlah RW</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dusun as $index => $item)
                            <tr id="row-{{ $index }}" class="block md:table-row mb-4 md:mb-0 border rounded-lg shadow-md md:shadow-none md:border-0">
                                <td class="p-3 flex justify-between items-center border-b md:border md:table-cell md:px-4 md:py-2">
                                    <strong class="md:hidden text-sm">Nama Dusun</strong>
                                    <div class="text-right md:text-left">
                                        <span class="text">{{ $item->dusun }}</span>
                                        <input type="text" class="hidden w-full border rounded p-1 text-left" value="{{ $item->dusun }}">
                                    </div>
                                </td>
                                <td class="p-3 flex justify-between items-center border-b md:border md:table-cell md:px-4 md:py-2">
                                    <strong class="md:hidden text-sm">Kepala Dusun</strong>
                                    <div class="text-right md:text-left">
                                        <span class="text">{{ $item->nama_kepala_dusun }}</span>
                                        <input type="text" class="hidden w-full border rounded p-1 text-left" value="{{ $item->nama_kepala_dusun }}">
                                    </div>
                                </td>
                                <td class="p-3 flex justify-between items-center border-b md:border md:table-cell md:px-4 md:py-2">
                                    <strong class="md:hidden text-sm">Jumlah RT</strong>
                                    <div class="text-right md:text-left">
                                        <span class="text">{{ $item->jml_rt }}</span>
                                        <input type="number" class="hidden w-24 border rounded p-1 text-left" value="{{ $item->jml_rt }}">
                                    </div>
                                </td>
                                <td class="p-3 flex justify-between items-center border-b md:border md:table-cell md:px-4 md:py-2">
                                    <strong class="md:hidden text-sm">Jumlah RW</strong>
                                    <div class="text-right md:text-left">
                                        <span class="text">{{ $item->jml_rw }}</span>
                                        <input type="number" class="hidden w-24 border rounded p-1 text-left" value="{{ $item->jml_rw }}">
                                    </div>
                                </td>
                                <td class="p-3 flex justify-end items-center gap-3 md:border md:table-cell md:px-4 md:py-2 md:text-center">
                                    <button type="button" onclick="editRow({{ $index }})" class="text-blue-600 hover:text-blue-800">
                                        <img src="{{ asset('assets/images/icons/edit-secondary-green.svg') }}" alt="Edit" class="w-5 h-5">
                                    </button>
                                    <button type="button" onclick="saveRow({{ $index }}, {{ $item->id }})" class="hidden text-green-600 hover:text-green-800 save-btn">
                                        <img src="{{ asset('assets/images/icons/check.svg') }}" alt="Save" class="w-5 h-5">
                                    </button>
                                    <button data-modal="Modal-DeleteDusun" data-id="{{ $item->id }}" class="text-red-600 hover:text-red-800">
                                        <img src="{{ asset('assets/images/icons/trash-red.svg') }}" alt="Hapus" class="w-5 h-5">
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
            </div>

            <hr class="border-desa-background my-6" />
        @endif
        <div class="flex items-center justify-between mt-4">
            <div class="flex flex-col gap-2">
                <h1 class="font-semibold text-2xl">Form Tambah Dusun</h1>
            </div>
        </div>
        <form action="{{ route('dashboard.storedusun') }}" id="myForm" method="POST" class="capitalize my-6">
            @csrf
            <div id="dusunContainer" class="flex flex-col gap-6">
                <div class="dusun-item relative shrink-0 rounded-3xl p-6 mt-4 bg-white flex flex-col gap-6 h-fit border border-desa-background">
                    <button type="button" onclick="removeDusun(this)"
                        style="width: 32px; height: 32px; border-radius: 50%; background-color: #f87171; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; line-height: 1; box-shadow: 0 2px 6px rgba(0,0,0,0.2); position: absolute; top: -10px; left: -10px; cursor: pointer;">
                        ×
                    </button>

                    <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-3">
                        <div class="flex flex-col gap-2 w-full md:flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Nama Dusun</p>
                            <label class="relative group peer w-full">
                                <input type="text" placeholder="Masukan nama dusun" name="dusun[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/building-4-secondary-green.svg') }}" class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/building-4-black.svg') }}" class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col gap-2 w-full md:flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Nama Kepala Dusun</p>
                            <label class="relative group peer w-full">
                                <input type="text" placeholder="Masukan nama kepala dusun" name="nama_kepala_dusun[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/profile-secondary-green.svg') }}" class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/profile-dark-green.svg') }}" class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex flex-col gap-2 w-full md:flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Jumlah RT</p>
                            <label class="relative group peer w-full">
                                <input type="number" placeholder="Masukan Jumlah RT" name="jml_rt[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}" class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}" class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col gap-2 w-full md:flex-1">
                            <p class="font-medium leading-5 text-desa-secondary">Jumlah RW</p>
                            <label class="relative group peer w-full">
                                <input type="number" placeholder="Masukan Jumlah RW" name="jml_rw[]" required
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}" class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/location-secondary-green.svg') }}" class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end my-6">
                <button type="button" onclick="addDusun()"
                    class="py-3 px-6 rounded-full bg-desa-yellow text-black font-medium shadow-md hover:bg-yellow-400 transition">
                    + Tambah Dusun
                </button>
            </div>

            <hr class="border-desa-background my-6" />
            <section id="Buttons" class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4">
                <button type="reset"
                    class="py-[18px] rounded-2xl bg-desa-red w-full sm:w-[180px] text-center flex justify-center font-medium text-white">
                    Batal, Tidak jadi
                </button>
                <button   type="submit"
                    class="py-[18px] rounded-2xl disabled:bg-desa-grey w-full sm:w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">
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
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0" alt="icon">
                </button>
            </div>
            <div class="flex flex-col p-4 gap-3">
                <p class="font-medium text-sm leading-[22.5px] text-desa-secondary">
                    Tindakan ini permanen dan tidak bisa dibatalkan!
                </p>
                <hr class="border-desa-background">
                <div class="flex items-center gap-3">
                    <button type="button" class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                        <span class="font-semibold text-sm">Batal</span>
                    </button>
                    <form action="" id="eventDelete" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center justify-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-red w-full">
                            <img src="{{ asset('/assets/images/icons/trash-white.svg') }}" class="flex size-6 shrink-0" alt="">
                            <span class="font-semibold text-sm text-white">Iya Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- Javascript tidak memerlukan perubahan untuk responsivitas --}}
        <script>
            // Script Modal Delete
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

            // Script Repeater Form
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
                    let btn = item.querySelector("button[onclick='removeDusun(this)']"); // More specific selector
                    btn.style.display = items.length === 1 ? "none" : "flex"; // Hide if only one item
                });
            }
            // Initial check on page load
            document.addEventListener("DOMContentLoaded", updateRemoveButtons);


            // Script Edit & Save Inline
            function editRow(index) {
                const row = document.getElementById(`row-${index}`);
                row.querySelectorAll(".text").forEach(el => el.classList.add("hidden"));
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
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" // Also good to send token in header
                    },
                    body: JSON.stringify(data)
                }).then(res => res.json())
                .then(response => {
                    if (response.success) { // Assuming your controller returns a success flag
                        row.querySelectorAll("span.text")[0].innerText = data.dusun;
                        row.querySelectorAll("span.text")[1].innerText = data.nama_kepala_dusun;
                        row.querySelectorAll("span.text")[2].innerText = data.jml_rt;
                        row.querySelectorAll("span.text")[3].innerText = data.jml_rw;

                        row.querySelectorAll(".text").forEach(el => el.classList.remove("hidden"));
                        row.querySelectorAll("input").forEach(el => el.classList.add("hidden"));
                        row.querySelector(".save-btn").classList.add("hidden");
                        
                        // Add feedback to user, e.g., using a toast notification library
                        // Toast.success('Berhasil Update Dusun');
                        console.log('Update successful');
                    } else {
                        // Handle error
                        // Toast.error('Gagal Update Dusun');
                        console.error('Update failed:', response.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    // Toast.error('Terjadi kesalahan');
                });
            }
        </script>
    @endpush
@endsection