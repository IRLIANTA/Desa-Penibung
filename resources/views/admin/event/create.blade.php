@extends('admin.layouts.app')

@section('content')
<div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
    <div id="Header" class="flex items-center justify-between">
        <div class="flex flex-col gap-2">
            <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Events Desa</p>
                <span>/</span>
                <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Tambah Event Desa</p>
            </div>
            <h1 class="font-semibold text-2xl">Tambah Event Desa</h1>
        </div>
    </div>

    {{-- FORM CREATE EVENT --}}
    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" id="myForm" class="capitalize">
        @csrf
        <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">

            {{-- Thumbnail Upload --}}
            <section class="flex items-center justify-between">
                <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Thumbnail Event</h2>
                <div class="flex-1 flex items-center justify-between">
                    <div id="Photo-Preview"
                        class="flex justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img id="Photo" src="{{ asset('/assets/images/thumbnails/thumbnail-bansos-preview.svg') }}"
                            alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative">
                        <input required id="File" type="file" name="thumbnail" accept="image/*"
                            class="absolute opacity-0 left-0 w-full top-0 h-full cursor-pointer" />
                        <button id="Upload" type="button"
                            class="relative flex items-center py-4 px-6 rounded-2xl bg-desa-black gap-[10px]">
                            <img src="{{ asset('/assets/images/icons/send-square-white.svg') }}" alt="icon"
                                class="size-6 shrink-0" />
                            <p class="font-medium leading-5 text-white">Upload</p>
                        </button>
                    </div>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Nama Event --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Event</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input name="name" type="text" placeholder="Ketik nama event terkait"
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary transition-all duration-300"
                            required>
                        <div class="absolute top-1/2 left-4 -translate-y-1/2 flex size-6 shrink-0">
                            <img src="{{ asset('/assets/images/icons/edit-black.svg') }}" class="size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Status Event --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Status Event</p>
                <div class="flex flex-1 gap-6 shrink-0">
                    <label class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:bg-desa-foreshadow transition">
                        <input type="radio" name="status" value="open" required
                            class="accent-desa-dark-green" />
                        <span class="font-medium leading-5 text-desa-secondary group-has-[:checked]:text-desa-dark-green">Open</span>
                    </label>
                    <label class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:bg-desa-foreshadow transition">
                        <input type="radio" name="status" value="closed"
                            class="accent-desa-dark-green" />
                        <span class="font-medium leading-5 text-desa-secondary group-has-[:checked]:text-desa-dark-green">Closed</span>
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Waktu Mulai --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Waktu Mulai Event</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <input type="time" name="start_time" required
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black px-4 font-medium" />
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Jumlah Partisipasi --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Warga Partisipasi</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <input name="partisipasi" type="number" placeholder="Masukkan jumlah warga"
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black px-4 font-medium placeholder:text-desa-secondary"
                        required>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Tanggal --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal Event</p>
                <div class="flex items-center gap-6 flex-1 shrink-0">
                    <input type="date" name="date" id="date" required
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black px-4 font-medium" />
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Deskripsi --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi Event</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <textarea name="description" placeholder="Jelaskan lebih detail tentang event" rows="6"
                        class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 font-medium placeholder:text-desa-secondary"></textarea>
                </div>
            </section>

            <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />

            {{-- Buttons --}}
            <section class="flex items-center justify-end gap-4">
                <a href="{{ route('event.index') }}">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal</div>
                </a>
                <button type="submit"
                    class="py-[18px] rounded-2xl w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition">
                    Simpan
                </button>
            </section>
        </div>
    </form>
</div>

{{-- JS untuk preview foto --}}
@push('scripts')
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("File");
        const uploadBtn = document.getElementById("Upload");
        const photo = document.getElementById("Photo");

        uploadBtn.addEventListener("click", () => fileInput.click());

        fileInput.addEventListener("change", function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    photo.src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush

@endsection
