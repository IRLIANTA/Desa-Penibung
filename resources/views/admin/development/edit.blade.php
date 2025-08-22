@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col gap-3 p-4 sm:gap-3.5 md:p-6">
        <div id="Header" class="flex flex-col gap-2">
            <div class="flex items-center gap-1 text-sm leading-5 text-desa-secondary">
                <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Pembangunan Desa</p>
                <span>/</span>
                <p class="capitalize last-of-type:font-semibold last-of-type:text-desa-dark-green">Ubah Pembangunan Desa</p>
            </div>
            <h1 class="text-2xl font-semibold">Ubah Pembangunan Desa</h1>
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
    <form action="{{ route('development.update', $dev->id) }}" enctype="multipart/form-data" method="POST" class="capitalize">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $dev->id }}">
        <div class="flex h-fit flex-col gap-6 rounded-3xl bg-white p-4 md:p-6">
            <section id="Dana" class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Dana Tersedia</p>
                <div class="grid flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="group flex h-14 w-full cursor-not-allowed items-center gap-2 rounded-2xl bg-desa-foreshadow p-4 ring-0">
                        <input type="radio" name="dana_display" {{ $dev->total_dana > 0 ? 'checked' : '' }} disabled class="size-[18px] shrink-0 accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-dark-green">Tersedia</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('assets') }}/images/icons/wallet-check-dark-green.svg" class="size-6" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-not-allowed items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background">
                        <input type="radio" name="dana_display" {{ $dev->total_dana <= 0 ? 'checked' : '' }} disabled class="size-[18px] shrink-0 accent-desa-secondary">
                        <span class="w-full font-medium leading-5 text-desa-secondary">Tidak Tersedia</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('assets') }}/images/icons/wallet-remove-secondary-green.svg" class="size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Total-Dana" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Total Dana</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="number" value="{{ $dev->total_dana }}" name="total_dana" placeholder="Ketik total dana" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('assets') }}/images/icons/wallet-3-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/wallet-3-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Thumbnail" class="flex flex-col justify-between gap-4 md:flex-row">
                <h2 class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Thumbnail Event Terkait</h2>
                <div class="flex flex-1 flex-col items-center justify-between gap-4 sm:flex-row">
                    <div id="Photo-Preview" class="flex h-[100px] w-[120px] shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-desa-foreshadow">
                        <img id="Photo" src="{{ $dev->thumbnail ? asset('storage/' . $dev->thumbnail) : asset('assets/images/thumbnails/thumbnail-bansos-preview.svg') }}" alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative w-full sm:w-auto">
                        <input id="File" type="file" name="thumbnail" accept="image/*" class="absolute left-0 top-0 h-full w-full cursor-pointer opacity-0" />
                        <button id="Upload" type="button" class="relative flex w-full items-center justify-center gap-[10px] rounded-2xl bg-desa-black px-6 py-4 sm:w-auto">
                            <img src="{{ asset('/assets') }}/images/icons/send-square-white.svg" alt="icon" class="size-6 shrink-0" />
                            <p class="font-medium leading-5 text-white">Ubah Gambar</p>
                        </button>
                    </div>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Nama-Projek" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Nama Projek Pembangunan</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="text" value="{{ $dev->nama_projek }}" name="nama_projek" placeholder="Ketik nama project pembangunan" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('assets') }}/images/icons/edit-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/edit-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Penanggung-Jawab" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Penanggung Jawab</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="text" value="{{ $dev->giver }}" name="giver" placeholder="Ketik penanggung jawab" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('assets') }}/images/icons/profile-circle-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/profile-circle-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Status" class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Status Pembangunan</p>
                <div class="grid flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="status" value="On Going" {{ $dev->status === 'On Going' ? 'checked' : '' }} class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">On Going</span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('assets') }}/images/icons/tick-circle-secondary-green.svg" class="flex size-6 group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/tick-circle-dark-green.svg" class="hidden size-6 group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label class="group flex h-14 w-full cursor-pointer items-center gap-2 rounded-2xl p-4 ring-[1.5px] ring-desa-background transition-all duration-300 has-[:checked]:bg-desa-foreshadow has-[:checked]:ring-0">
                        <input type="radio" name="status" value="Completed" {{ $dev->status === 'Completed' ? 'checked' : '' }} class="size-[18px] shrink-0 accent-desa-secondary transition-all duration-300 checked:accent-desa-dark-green">
                        <span class="w-full font-medium leading-5 text-desa-secondary transition-all duration-300 group-has-[:checked]:text-desa-dark-green">Completed</span>
                        <div class="flex size-6 shrink-0">
                           <img src="{{ asset('/assets') }}/images/icons/close-circle-secondary-green.svg" class="flex size-6" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Tanggal-Pembangunan" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Tanggal Pembangunan</p>
                <div class="flex flex-1 shrink-0 items-center gap-6">
                    <label class="group peer relative w-full">
                        <input required type="date" name="tanggal_pembangunan" value="{{ \Carbon\Carbon::parse($dev->tanggal_pembangunan)->format('Y-m-d') }}" class="h-14 w-full appearance-none rounded-2xl p-4 pl-12 font-medium ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black invalid:text-desa-secondary [&::-webkit-calendar-picker-indicator]:hidden" onclick="this.showPicker();">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('assets') }}/images/icons/calendar-2-secondary-green.svg" class="hidden size-6 group-has-[:invalid]:flex" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/calendar-2-black.svg" class="flex size-6 group-has-[:invalid]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Hari" class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
                <p class="w-full font-medium leading-5 text-desa-secondary md:w-1/3">Hari yang dibutuhkan</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <label class="group peer relative w-full">
                        <input type="number" value="{{ $dev->hari }}" name="hari" placeholder="Ketik hari yang dibutuhkan" class="h-14 w-full appearance-none rounded-2xl py-4 pl-12 pr-[98px] font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">
                        <div class="absolute left-4 top-1/2 flex size-6 shrink-0 -translate-y-1/2">
                            <img src="{{ asset('assets') }}/images/icons/timer-secondary-green.svg" class="flex size-6 group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('assets') }}/images/icons/timer-black.svg" class="hidden size-6 group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                        <div class="absolute right-4 top-1/2 flex shrink-0 -translate-y-1/2 gap-6">
                            <div class="h-6 w-px border border-desa-background"></div>
                            <span class="font-medium leading-5 text-desa-dark-green group-has-[:placeholder-shown]:text-desa-secondary">Hari</span>
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />

            <section id="Deskripsi" class="flex flex-col justify-between gap-4 md:flex-row">
                <p class="w-full pt-4 font-medium leading-5 text-desa-secondary md:w-1/3">Deskripsi Pembangunan</p>
                <div class="flex flex-1 shrink-0 flex-col gap-3">
                    <textarea name="deskripsi" placeholder="Jelaskan lebih detail tentang pembangunan" rows="6" class="w-full appearance-none rounded-2xl p-4 font-medium placeholder:text-desa-secondary ring-[1.5px] ring-desa-background transition-all duration-300 focus:outline-none focus:ring-desa-black">{{ $dev->deskripsi }}</textarea>
                </div>
            </section>
            <hr class="w-full border-desa-background" />

            <section id="Buttons" class="flex flex-col-reverse items-center justify-end gap-4 sm:flex-row">
                <a href="{{ route('development.index') }}" class="flex w-full items-center justify-center rounded-2xl bg-desa-red py-4 font-medium text-white sm:w-[180px]">
                    Batal, Tidak jadi
                </a>
                <button id="submitButton" type="submit" class="flex w-full items-center justify-center rounded-2xl bg-desa-dark-green py-4 font-medium text-white transition-all duration-300 disabled:bg-desa-grey sm:w-[180px]">
                    Simpan Perubahan
                </button>
            </section>
        </div>
    </form>
    </div>
    @push('scripts')
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
    @endpush
@endsection