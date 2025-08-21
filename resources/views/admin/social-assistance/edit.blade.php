@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Bantuan sosial</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">tambah bantuan sosial
                    </p>
                </div>
                <h1 class="font-semibold text-2xl">Tambah Bantuan Sosial</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200">
                <ul class="list-disc pl-5 text-sm text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('social-assistance.update') }}" method="POST" enctype="multipart/form-data" id="myForm"
        class="capitalize">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $socialAssistance->id }}">
        <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
            <section id="thumbnail" class="flex items-center justify-between">
                <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Thumbnail Bantuan Sosial
                </h2>
                <div class="flex-1 flex items-center justify-between">
                    <div id="Photo-Preview"
                        class="flex itce justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img id="Photo" src="{{ asset('/assets') }}/images/thumbnails/thumbnail-bansos-preview.svg"
                            alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative">
                        <input required id="File" type="file" name="thumbnail"
                            class="absolute opacity-0 left-0 w-full top-0 h-full" />
                        <button id="Upload" type="button"
                            class="relative flex items-center py-4 px-6 rounded-2xl bg-desa-black gap-[10px]">
                            <img src="{{ asset('/assets') }}/images/icons/send-square-white.svg" alt="icon"
                                class="size-6 shrink-0" />
                            <p class="font-medium leading-5 text-white">Upload</p>
                        </button>
                    </div>
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="name" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Bantuan Sosial</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input type="text" placeholder="Tentukan nama bantuan sosial" name="name"
                            {{ $socialAssistance->name }}
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                        <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/edit-secondary-green.svg"
                                class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/edit-black.svg"
                                class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="category" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pilih Opsi Ketersediaan</p>
                <div class="grid grid-cols-2 flex-1 gap-6 shrink-0">
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="category" id="category" value="Bahan Pokok"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            Bahan Pokok
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/bag-2-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/bag-2-dark-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="category" id="category" value="Uang Tunai"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            Uang Tunai
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/money-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/money-dark-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="category" id="category" value="BBM Subsidi"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            BBM Subsidi
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/gas-station-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/gas-station-dark-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="category" id="category" value="Kesehatan"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            Kesehatan
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/health-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/health-secondary-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="amount" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nominal Bantuan</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input type="text" name="amount" placeholder="Ketik nominal bantuan"
                            {{ $socialAssistance->amount }}
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 pr-12 [&:placeholder-shown]:pl-12 pl-[70px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">

                        <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/dollar-square-secondary-green.svg"
                                class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/dollar-square-black.svg"
                                class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            <span
                                class="text-desa-black ml-2 opacity-100 group-has-[:placeholder-shown]:opacity-0 transition-setup"></span>
                        </div>
                    </label>
                </div>
            </section>
            {{-- Tanggal --}}
            <section class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal Event</p>
                <div class="flex items-center gap-6 flex-1 shrink-0">
                    <input type="date" name="date" id="date" required
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black px-4 font-medium" />
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="giver_name" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Pemberi Bantuan</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input type="text" placeholder="Ketik nama orang atau organisasi" name="giver_name"
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                        <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/user-square-secondary-green.svg"
                                class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/user-square-black.svg"
                                class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="Deskripsi" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi Bantuan Sosial
                </p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <textarea name="description" id="description" placeholder="Jelaskan lebih detail tentang bantuan" rows="6"
                        class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">{{ $socialAssistance->description }}</textarea>
                </div>
            </section>
            <hr class="border-desa-background" />
            <section id="Ketersediaan" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pilih Opsi Ketersediaan</p>
                <div class="flex flex-1 gap-6 shrink-0">
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="availability" id="" value="Tersedia"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            Tersedia
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/tick-circle-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/tick-circle-dark-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                        <input type="radio" name="availability" id="" value="Tidak Tersedia"
                            class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                        <span
                            class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                            Tidak Tersedia
                        </span>
                        <div class="flex size-6 shrink-0">
                            <img src="{{ asset('/assets') }}/images/icons/close-circle-secondary-green.svg"
                                class="size-6 flex group-has-[:checked]:hidden" alt="icon">
                            <img src="{{ asset('/assets') }}/images/icons/close-circle-secondary-green.svg"
                                class="size-6 hidden group-has-[:checked]:flex" alt="icon">
                        </div>
                    </label>
                </div>
            </section>
            <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />
            <section id="Buttons" class="flex items-center justify-end gap-4">
                <a href="{{ route('social-assistance.index') }}">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal, Tidak jadi</div>
                </a>
                <button id="submitButton" type="submit"
                    class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">Create
                    Now</button>
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
