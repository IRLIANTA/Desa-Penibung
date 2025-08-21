@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Profile Desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Edit Profile Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Edit Profile Desa</h1>
            </div>
            <div class="flex items-center gap-3">
 

                <a href="{{ route('profile.media.index') }}"
                    class="flex items-center rounded-2xl py-3 px-4 gap-[10px] bg-desa-green">
                    <p class="font-medium text-white">Lihat Media</p>
                    <img src="{{ asset('/assets/images/icons/eye-white-fill.svg') }}" class="flex size-6 shrink-0"
                        alt="icon">
                </a>
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
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="myForm"
            class="capitalize">
            @csrf
            @method('PUT')
            <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
                <hr class="border-desa-background" />
                <section id="Nama-Desa" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Ketik nama desa" name="desa_name"
                                value="{{ get_profile('desa_name') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/building-4-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('assets/') }}/images/icons/building-4-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Lokasi" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Lokasi Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <textarea name="location" id="" placeholder="Ketik alamat desa" rows="6"
                            class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300"> {{ get_profile('location') }}</textarea>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Kepala-Desa" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Kepala Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Pilih Kepala Desa" name="kepala_desa_name"
                                value="{{ get_profile('kepala_desa_name') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/user-square-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('assets/') }}/images/icons/user-square-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section class="flex items-center justify-between">
                    <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Foto Kepala Desa</h2>
                    <div class="flex-1 flex items-center justify-between">
                        <div id="Photo-Preview"
                            class="flex justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                            <img id="Photo" src="{{ asset('/assets/images/thumbnails/thumbnail-bansos-preview.svg') }}"
                                alt="image" class="size-full object-cover" />
                        </div>
                        <div class="relative">
                            <input  id="File" type="file" name="kepala_desa_profil" accept="image/*"
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
                <section id="Luas-Pertanian" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Luas Pertanian Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Masukan total luas pertanian" name="luas_petanian"
                                value="{{ get_profile('luas_petanian') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 pr-[98px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/tree-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('assets/') }}/images/icons/tree-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                            <div class="absolute transform -translate-y-1/2 top-1/2 right-4 flex shrink-0 gap-6">
                                <div class="w-px h-6 border border-desa-background"></div>
                                <span
                                    class="font-medium leading-5 text-desa-black group-has-[:placeholder-shown]:text-desa-secondary normal-case">m<sup>2</sup></span>
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Luas-Area" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Luas Area Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Masukan total luas area" name="luas_area"
                                value="{{ get_profile('luas_area') }}"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 pr-[98px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('assets/') }}/images/icons/grid-5-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('assets/') }}/images/icons/grid-5-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                            <div class="absolute transform -translate-y-1/2 top-1/2 right-4 flex shrink-0 gap-6">
                                <div class="w-px h-6 border border-desa-background"></div>
                                <span
                                    class="font-medium leading-5 text-desa-black group-has-[:placeholder-shown]:text-desa-secondary normal-case">m<sup>2</sup></span>
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                 <section class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal Event</p>
                    <div class="flex items-center gap-6 flex-1 shrink-0">
                        <input type="date" id="date" name="tgl_desa_dibangun"
                            value="{{ \Carbon\Carbon::parse(get_profile('tgl_desa_dibangun'))->format('Y-m-d') }}" required
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black px-4 font-medium" />

                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Deskripsi" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi Tentang Desa</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <textarea name="description" id="" placeholder="Jelaskan lebih detail tentang desa terkait" rows="6"
                            class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">{{ get_profile('description') }}</textarea>
                    </div>
                </section>
                <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />
                <section id="Buttons" class="flex items-center justify-end gap-4">
                    <button type="reset">
                        <div
                            class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                            Batal, Tidak jadi</div>
                    </button>
                    <button  type="submit"
                        class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">Save
                        Changes</button>
                </section>
            </div>
        </form>
        <div id="Header" class="flex items-center justify-between" style="margin-top:1rem; ">
            <div class="flex flex-col gap-2">

                <h1 class="font-semibold text-2xl">Foto Profile Desa</h1>
            </div>
        </div>
        <form action="{{ route('profile.media.store') }}" method="POST" enctype="multipart/form-data" id="myForm"
            class="capitalize">
            @csrf
            <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">

                <h2 class="font-medium leading-5 text-desa-secondary">Data Foto Desa</h2>

                <div class="desa-repeater flex flex-col gap-6 ">

                    <div
                        class="desa-form group/parent flex flex-col md:flex-row items-start md:items-center gap-6 new mt-6">
                        <!-- Foto -->
                        <div
                            class="Photo-Preview flex justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                            <img class="Photo size-full object-cover"
                                src="{{ asset('assets/images/thumbnails/thumbnail-bansos-preview.svg') }}"
                                alt="image" />
                        </div>

                        <div class="flex flex-col gap-4 flex-1 w-full">
                            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi
                                (Optional)</p>

                            <label class="relative group peer w-full">
                                <input type="text" placeholder="Masukkan Deskripsi" name="description[]"
                                    class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                                <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                    <img src="{{ asset('assets/images/icons/building-4-secondary-green.svg') }}"
                                        class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                    <img src="{{ asset('assets/images/icons/building-4-black.svg') }}"
                                        class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                </div>
                            </label>

                            <div class="flex gap-3">
                                <input type="file" name="file_path[]" required class="photo-input hidden" />
                                <button type="button"
                                    class="Upload-btn relative flex items-center py-3 px-4 rounded-2xl bg-desa-black gap-[10px]">
                                    <img src="{{ asset('assets/images/icons/send-square-white.svg') }}" alt="icon"
                                        class="size-5 shrink-0" />
                                    <p class="font-medium leading-5 text-white">Upload</p>
                                </button>
                                <button type="button"
                                    class="delete size-12 rounded-2xl p-3 bg-desa-red items-center hidden justify-center group-[&.new]/parent:flex"
                                    onclick="deleteDesaForm(this)">
                                    <img src="{{ asset('assets/images/icons/trash-white.svg') }}"
                                        class="flex size-5 shrink-0" alt="icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button"
                        class="add-more-btn flex items-center rounded-2xl py-3 px-5 gap-2 bg-desa-foreshadow">
                        <p class="font-medium leading-5 text-desa-dark-green">Tambah Foto</p>
                        <img src="{{ asset('assets/images/icons/add-square-dark-green.svg') }}"
                            class="flex size-5 shrink-0" alt="icon">
                    </button>
                </div>
            </div>
            <section class="flex items-center justify-end gap-4 mt-5">
                <button type="reset">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal</div>
                </button>
                <button type="submit"
                    class="py-[18px] rounded-2xl w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition">
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
