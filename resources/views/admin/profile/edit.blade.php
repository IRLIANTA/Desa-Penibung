@extends('admin.layouts.app')
@section('content')
    <div class="gap-3 sm:gap-3.5 flex flex-col px-2 sm:px-4">
        <div id="Header" class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary text-sm">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize">Profile Desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize">Edit Profile Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Edit Profile Desa</h1>
            </div>
            <a href="{{ route('profile.media.index') }}"
                class="flex items-center rounded-2xl py-3 px-4 gap-[10px] bg-desa-green w-full sm:w-auto justify-center">
                <p class="font-medium text-white">Lihat Media</p>
                <img src="{{asset('assets/')}}/images/icons/eye-white-fill.svg" class="flex size-6 shrink-0"
                    alt="icon">
            </a>
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
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="myForm"
            class="capitalize">
            @csrf
            @method('PUT')
            <div class="shrink-0 rounded-3xl p-4 md:p-6 bg-white flex flex-col gap-6 h-fit">
                <section class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Nama Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Ketik nama desa" name="desa_name"
                                value="{{ get_profile('desa_name') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{asset('assets/')}}/images/icons/building-4-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{asset('assets/')}}/images/icons/building-4-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3 pt-4">Lokasi Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        <textarea name="location" placeholder="Ketik alamat desa" rows="6"
                            class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">{{ get_profile('location') }}</textarea>
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Nama Kepala Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Pilih Kepala Desa" name="kepala_desa_name"
                                value="{{ get_profile('kepala_desa_name') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{asset('assets/')}}/images/icons/user-square-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{asset('assets/')}}/images/icons/user-square-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row justify-between gap-4">
                    <h2 class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Foto Kepala Desa</h2>
                    <div class="flex-1 flex flex-col sm:flex-row items-center justify-between gap-4 w-full">
                        <div id="Photo-Preview"
                        
                            class="flex justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow shrink-0">
                            <img id="Photo" src="{{asset('assets/')}}/images/thumbnails/thumbnail-bansos-preview.svg"
                                alt="image" class="size-full object-cover" />
                        </div>
                        <div class="relative w-full sm:w-auto">
                            <input id="File" type="file" name="kepala_desa_profil" accept="image/*"
                                class="absolute opacity-0 left-0 w-full top-0 h-full cursor-pointer" />
                            <button id="Upload" type="button"
                                class="relative flex items-center justify-center w-full sm:w-auto py-4 px-6 rounded-2xl bg-desa-black gap-[10px]">
                                <img src="{{asset('assets/')}}/images/icons/send-square-white.svg" alt="icon"
                                    class="size-6 shrink-0" />
                                <p class="font-medium leading-5 text-white">Upload</p>
                            </button>
                        </div>
                    </div>
                </section>
                <hr class="border-desa-background" />

                {{-- ... (Ulangi pola yang sama untuk section lainnya) ... --}}

                <section class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Luas Pertanian Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        {{-- Input Luas Pertanian --}}
                        <input type="number" name="luas_pertanian" id="luas_pertanian"
                            placeholder="Masukkan luas pertanian (ha)"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-desa-primary focus:outline-none" />
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Luas Area Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        {{-- Input Luas Area --}}
                        <input type="number" name="luas_area" id="luas_area"
                            class="w-full px-3 py-2 border border-desa-background rounded-lg focus:outline-none focus:ring-2 focus:ring-desa-foreshadow focus:border-desa-foreshadow text-sm sm:text-base"
                            placeholder="Masukkan luas area desa (m²)"
                            value="{{ old('luas_area', get_profile('luas_area')) }}">
                        <span class="text-xs text-desa-secondary">Satuan dalam meter persegi (m²)</span>
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3">Tanggal Dibangun</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        {{-- Input Tanggal --}}
                        <input type="date" name="tgl_desa_dibangun" id="tgl_desa_dibangun"
                            class="w-full px-3 py-2 border border-desa-background rounded-lg focus:outline-none focus:ring-2 focus:ring-desa-foreshadow focus:border-desa-foreshadow text-sm sm:text-base"
                            value="{{ old('tgl_desa_dibangun', get_profile('tgl_desa_dibangun')) }}">
                    </div>
                </section>
                <hr class="border-desa-background" />

                <section class="flex flex-col md:flex-row justify-between gap-2">
                    <p class="font-medium leading-5 text-desa-secondary w-full md:w-1/3 pt-4">Deskripsi Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0 w-full">
                        {{-- Textarea Deskripsi --}}
                        <textarea name="description" id="description" rows="6"
                            class="w-full px-3 py-2 border border-desa-background rounded-lg focus:outline-none focus:ring-2 focus:ring-desa-foreshadow focus:border-desa-foreshadow text-sm sm:text-base resize-y"
                            placeholder="Tulis deskripsi desa di sini...">{{ old('description', get_profile('description')) }}</textarea>
                    </div>
                </section>

                <hr class="border-desa-background w-full" />
                <section id="Buttons" class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4">
                    <button type="reset"
                        class="py-4 rounded-2xl bg-desa-red w-full sm:w-[180px] text-center flex justify-center font-medium text-white">
                        Batal, Tidak jadi
                    </button>
                    <button type="submit"
                        class="py-4 rounded-2xl disabled:bg-desa-grey w-full sm:w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">
                        Save Changes
                    </button>
                </section>
            </div>
        </form>
        <div class="flex items-center justify-between mt-4">
            <h1 class="font-semibold text-2xl">Foto Profile Desa</h1>
        </div>
        <form action="{{ route('profile.media.store') }}" method="POST" enctype="multipart/form-data" id="mediaForm">
            @csrf
            <div class="shrink-0 rounded-3xl p-4 md:p-6 bg-white flex flex-col gap-6 h-fit">
                <h2 class="font-medium leading-5 text-desa-secondary">Data Foto Desa</h2>
                <div class="desa-repeater flex flex-col gap-6">

                    <div class="desa-form group/parent flex flex-col md:flex-row items-center gap-6 mt-6">
                        <div
                            class="Photo-Preview flex justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow shrink-0">
                            <img class="Photo size-full object-cover"
                                src="{{asset('assets/')}}/images/thumbnails/thumbnail-bansos-preview.svg"
                                alt="image" />
                        </div>
                        <div class="flex flex-col gap-4 flex-1 w-full">
                            <label class="relative group peer w-full">
                                <p class="font-medium leading-5 text-desa-secondary mb-2">Deskripsi (Optional)</p>
                                <input type="text" placeholder="Masukkan Deskripsi" name="description[]"
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium placeholder:text-desa-secondary">
                                <div
                                    class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0 mt-3.5">
                                    <img src="{{asset('assets/')}}/images/icons/building-4-secondary-green.svg"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{asset('assets/')}}/images/icons/building-4-black.svg"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>
                            <div class="flex gap-3 items-center">
                                <input type="file" name="file_path[]" required class="photo-input hidden" />
                                <button type="button"
                                    class="Upload-btn relative flex items-center py-3 px-4 rounded-2xl bg-desa-black gap-[10px]">
                                    <img src="{{asset('assets/')}}/images/icons/send-square-white.svg" alt="icon"
                                        class="size-5 shrink-0" />
                                    <p class="font-medium text-sm leading-5 text-white">Upload</p>
                                </button>
                                <button type="button"
                                    class="delete size-12 rounded-2xl p-3 bg-desa-red items-center justify-center group-[&.new]/parent:flex"
                                    onclick="deleteDesaForm(this)">
                                    <img src="{{asset('assets/')}}/images/icons/trash-white.svg"
                                        class="flex size-5 shrink-0" alt="icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button"
                        class="add-more-btn flex items-center rounded-2xl py-3 px-5 gap-2 bg-desa-foreshadow">
                        <p class="font-medium leading-5 text-desa-dark-green">Tambah Foto</p>
                        <img src="{{asset('assets/')}}/images/icons/add-square-dark-green.svg"
                            class="flex size-5 shrink-0" alt="icon">
                    </button>
                </div>
            </div>

            <section class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 mt-5">
                <button type="reset"
                    class="py-4 rounded-2xl bg-desa-red w-full sm:w-[180px] text-center flex justify-center font-medium text-white">
                    Batal
                </button>
                <button type="submit"
                    class="py-4 rounded-2xl w-full sm:w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition">
                    Simpan
                </button>
            </section>
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const addMoreBtn = document.querySelector(".add-more-btn");
                const repeaterContainer = document.querySelector(".desa-repeater");

                const defaultPhotoSrc = document.querySelector(".desa-form .Photo").src;

                function initDesaForm(desaForm) {
                    const fileInput = desaForm.querySelector(".photo-input");
                    const photoPreview = desaForm.querySelector(".Photo");
                    const uploadBtn = desaForm.querySelector(".Upload-btn");
                    const deleteBtn = desaForm.querySelector(".delete");

                    uploadBtn.addEventListener("click", () => fileInput.click());

                    fileInput.addEventListener("change", (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = () => (photoPreview.src = reader.result);
                            reader.readAsDataURL(file);
                        } else {
                            photoPreview.src = defaultPhotoSrc;
                        }
                    });

                    updateDeleteButtons();
                }

                function updateDeleteButtons() {
                    const forms = repeaterContainer.querySelectorAll(".desa-form");
                    forms.forEach((form, index) => {
                        const deleteBtn = form.querySelector(".delete");
                        if (forms.length === 1) {
                            deleteBtn.style.display = "none";
                        } else {
                            deleteBtn.style.display = "flex";
                        }
                    });
                }

                document.querySelectorAll(".desa-form").forEach(initDesaForm);

                addMoreBtn.addEventListener("click", function() {
                    const template = document.querySelector(".desa-form");
                    if (!template) return;

                    const newForm = template.cloneNode(true);

                    newForm.querySelector(".Photo").src = defaultPhotoSrc;
                    newForm.querySelector(".photo-input").value = "";
                    newForm.querySelector("input[type='text']").value = "";

                    newForm.classList.add("new");

                    repeaterContainer.appendChild(newForm);
                    initDesaForm(newForm);
                });

                const form = document.getElementById("myForm");
                form.addEventListener("submit", function(e) {
                    const forms = repeaterContainer.querySelectorAll(".desa-form");
                    if (forms.length < 1) {
                        e.preventDefault();
                        alert("Minimal harus ada 1 foto desa!");
                    }
                });
            });

            function deleteDesaForm(button) {
                const form = button.closest(".desa-form");
                const repeaterContainer = document.querySelector(".desa-repeater");

                if (repeaterContainer.querySelectorAll(".desa-form").length > 1) {
                    form.remove();
                } else {
                    alert("Minimal harus ada 1 foto desa!");
                }

                const event = new Event("DOMContentLoaded");
                document.dispatchEvent(event);
            }
        </script>

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
