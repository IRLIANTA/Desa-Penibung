@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col gap-3 p-4 sm:gap-3.5 md:p-6">
    <div id="Header" class="flex flex-col gap-2">
        <div class="flex items-center gap-1 text-sm leading-5 text-desa-secondary">
            <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Events Desa</p>
            <span>/</span>
            <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Tambah Event Desa</p>
        </div>
        <h1 class="text-2xl font-semibold">Tambah Event Desa</h1>
    </div>

    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" id="myForm" class="capitalize">
        @csrf
        <div class="flex h-fit flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">

            <section class="flex flex-col justify-between gap-4 md:flex-row">
                <h2 class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Thumbnail Event</h2>
                <div class="flex flex-1 flex-col items-center justify-between gap-4 sm:flex-row">
                    <div id="Photo-Preview" class="flex h-[100px] w-[120px] shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-desa-foreshadow">
                        <img id="Photo" src="{{ asset('/assets/images/thumbnails/thumbnail-bansos-preview.svg') }}" alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative w-full sm:w-auto">
                        <input required id="File" type="file" name="thumbnail" accept="image/*" class="absolute left-0 top-0 h-full w-full cursor-pointer opacity-0" />
                        <button id="Upload" type="button" class="relative flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-4 sm:w-auto">
                            <img src="{{ asset('/assets/images/icons/send-square-white.svg') }}" alt="icon" class="size-6 shrink-0" />
                            <p class="font-medium leading-5 text-white">Upload</p>
                        </button>
                    </div>
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Nama Event</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input name="name" type="text" placeholder="Ketik nama event terkait" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black" required>
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('/assets/images/icons/edit-black.svg') }}" class="size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Status Event</p>
                <div class="grid flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition has-[:checked]:bg-desa-foreshadow">
                        <input type="radio" name="status" value="open" required class="accent-desa-dark-green" />
                        <span class="font-medium leading-5 text-desa-secondary group-has-[:checked]:text-desa-dark-green">Open</span>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition has-[:checked]:bg-desa-foreshadow">
                        <input type="radio" name="status" value="closed" class="accent-desa-dark-green" />
                        <span class="font-medium leading-5 text-desa-secondary group-has-[:checked]:text-desa-dark-green">Closed</span>
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Waktu Mulai Event</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <input type="time" name="start_time" required class="h-14 w-full appearance-none rounded-2xl px-4 font-medium ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black" />
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Jumlah Warga Partisipasi</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <input name="partisipasi" type="number" placeholder="Masukkan jumlah warga" class="h-14 w-full appearance-none rounded-2xl px-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black" required>
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Tanggal Event</p>
                <div class="flex flex-1 shrink-0 items-center gap-6">
                    <input type="date" name="date" id="date" required class="h-14 w-full appearance-none rounded-2xl px-4 font-medium ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black" />
                </div>
            </section>

            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-4 md:flex-row">
                <p class="w-full pt-4 font-medium leading-5 text-desa-secondary md:w-1/3">Deskripsi Event</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <textarea name="description" placeholder="Jelaskan lebih detail tentang event" rows="6" class="w-full appearance-none rounded-2xl p-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black"></textarea>
                </div>
            </section>

            <hr class="w-full border-desa-background" />

            <section class="flex flex-col-reverse items-center justify-end gap-4 sm:flex-row">
                <a href="{{ route('event.index') }}" class="flex w-full items-center justify-center rounded-2xl bg-desa-red py-4 font-medium text-white sm:w-[180px]">
                    Batal
                </a>
                <button type="submit" class="flex w-full items-center justify-center rounded-2xl bg-desa-dark-green py-4 font-medium text-white transition sm:w-[180px]">
                    Simpan
                </button>
            </section>
        </div>
    </form>
</div>

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