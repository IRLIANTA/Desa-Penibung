@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col gap-3 p-4 sm:gap-3.5 md:p-6">
        <div id="Header" class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-1 text-sm leading-5 text-desa-secondary">
                    <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Bantuan sosial</p>
                    <span>/</span>
                    <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Ubah Bantuan Sosial</p>
                </div>
                <h1 class="text-2xl font-semibold">Ubah Bantuan Sosial</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4">
                <ul class="list-disc space-y-1 pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('social-assistance.update', $socialAssistance->id) }}" method="POST" enctype="multipart/form-data" id="myForm" class="capitalize">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $socialAssistance->id }}">
        <div class="flex h-fit flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
            <section id="thumbnail" class="flex flex-col justify-between gap-4 md:flex-row">
                <h2 class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Thumbnail Bantuan Sosial</h2>
                <div class="flex flex-1 flex-col items-center justify-between gap-4 sm:flex-row">
                    <div id="Photo-Preview" class="flex h-[100px] w-[120px] shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-desa-foreshadow">
                        <img id="Photo" src="{{ $socialAssistance->thumbnail ? asset('storage/' . $socialAssistance->thumbnail) : asset('/assets/images/thumbnails/thumbnail-bansos-preview.svg') }}" alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative w-full sm:w-auto">
                        <input id="File" type="file" name="thumbnail" class="absolute left-0 top-0 h-full w-full opacity-0" />
                        <button id="Upload" type="button" class="relative flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-4 sm:w-auto">
                            <img src="{{ asset('/assets') }}/images/icons/send-square-white.svg" alt="icon" class="size-6 shrink-0" />
                            <p class="font-medium leading-5 text-white">Ubah Gambar</p>
                        </button>
                    </div>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="name" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Nama Bantuan Sosial</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="text" placeholder="Tentukan nama bantuan sosial" name="name" value="{{ $socialAssistance->name }}" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('/assets') }}/images/icons/edit-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/edit-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="category" class="flex flex-col justify-between gap-4 md:flex-row">
                <p class="w-full pt-2 font-medium leading-5 text-desa-secondary md:w-1/3">Pilih Opsi Kategori</p>
                <div class="grid flex-1 shrink-0 grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="category" value="Bahan Pokok" @if($socialAssistance->category == 'Bahan Pokok') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Bahan Pokok</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/bag-2-secondary-green.svg" class="flex size-6 group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/bag-2-dark-green.svg" class="hidden size-6 group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="category" value="Uang Tunai" @if($socialAssistance->category == 'Uang Tunai') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Uang Tunai</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/money-secondary-green.svg" class="flex size-6 group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg" class="hidden size-6 group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="category" value="BBM Subsidi" @if($socialAssistance->category == 'BBM Subsidi') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">BBM Subsidi</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/gas-station-secondary-green.svg" class="flex size-6 group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/gas-station-dark-green.svg" class="hidden size-6 group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="category" value="Kesehatan" @if($socialAssistance->category == 'Kesehatan') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Kesehatan</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/health-secondary-green.svg" class="flex size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="amount" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Nominal Bantuan</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="text" name="amount" placeholder="Ketik nominal bantuan" value="{{ $socialAssistance->amount }}" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('/assets') }}/images/icons/dollar-square-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/dollar-square-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Tanggal Event</p>
                <div class="flex flex-1 shrink-0 items-center gap-6">
                    <input type="date" name="date" id="date" required value="{{ \Carbon\Carbon::parse($socialAssistance->date)->format('Y-m-d') }}" class="h-14 w-full appearance-none rounded-2xl px-4 font-medium ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black" />
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="giver_name" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Nama Pemberi Bantuan</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="text" placeholder="Ketik nama orang atau organisasi" name="giver_name" value="{{ $socialAssistance->giver_name }}" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('/assets') }}/images/icons/user-square-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/user-square-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Deskripsi" class="flex flex-col justify-between gap-4 md:flex-row">
                <p class="w-full pt-4 font-medium leading-5 text-desa-secondary md:w-1/3">Deskripsi Bantuan Sosial</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <textarea name="description" id="description" placeholder="Jelaskan lebih detail tentang bantuan" rows="6" class="w-full appearance-none rounded-2xl p-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">{{ $socialAssistance->description }}</textarea>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Ketersediaan" class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Pilih Opsi Ketersediaan</p>
                <div class="grid flex-1 grid-cols-1 gap-4 sm:flex-row sm:grid-cols-2">
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="availability" value="Tersedia" @if($socialAssistance->availability == 'Tersedia') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Tersedia</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/tick-circle-secondary-green.svg" class="flex size-6 group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/tick-circle-dark-green.svg" class="hidden size-6 group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="availability" value="Tidak Tersedia" @if($socialAssistance->availability == 'Tidak Tersedia') checked @endif class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Tidak Tersedia</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/close-circle-secondary-green.svg" class="flex size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="w-full border-desa-background" />

            <section id="Buttons" class="flex flex-col-reverse items-center justify-end gap-4 sm:flex-row">
                <a href="{{ route('social-assistance.index') }}" class="flex w-full items-center justify-center rounded-2xl bg-desa-red py-4 font-medium text-white sm:w-[180px]">
                    Batal, Tidak jadi
                </a>
                <button id="submitButton" type="submit" class="flex w-full items-center justify-center rounded-2xl bg-desa-dark-green py-4 font-medium text-white transition-all duration-300 disabled:bg-desa-grey sm:w-[180px]">
                    Simpan Perubahan
                </button>
            </section>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("File");
            const uploadBtn = document.getElementById("Upload");
            const photo = document.getElementById("Photo");

            uploadBtn.addEventListener("click", () => fileInput.click());

            fileInput.addEventListener("change", function() {
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
@endsection