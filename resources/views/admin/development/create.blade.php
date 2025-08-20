@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Pembangunan Desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Tambah Pembangunan
                        Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Tambah Pembangunan Desa</h1>
            </div>
        </div>
        <form action="{{ route('development.store') }}" method="POST" enctype="multipart/form-data" id="myForm"
            class="capitalize">
            @csrf
            <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
                <section id="Total-Dana" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Total Dana Pembangunan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="number" placeholder="Ketik dana yang dibutuhkan" name="total_dana"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 pr-12 [&:placeholder-shown]:pl-12 pl-[70px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('/assets') }}/images/icons/wallet-3-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('/assets') }}/images/icons/wallet-3-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                <span
                                    class="text-desa-black ml-2 opacity-100 group-has-[:placeholder-shown]:opacity-0 transition-setup">Rp</span>
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Thumbnail" class="flex items-center justify-between">
                    <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Thumbnail Event Terkait
                    </h2>
                    <div class="flex-1 flex items-center justify-between">
                        <div id="Photo-Preview"
                            class="flex itce justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                            <img id="Photo" src="{{ asset('/assets') }}/images/thumbnails/thumbnail-bansos-preview.svg"
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
                <section id="Nama-Projek" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Projek Pembangunan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Ketik nama project pembangunan" name="nama_projek"
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
                <section id="Penanggung-Jawab" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pemberi Bantuan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" placeholder="Ketik Pemberi Bantuan" name="giver"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('/assets') }}/images/icons/profile-circle-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('/assets') }}/images/icons/profile-circle-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Status" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Status Pembangunan</p>
                    <div class="flex flex-1 gap-6 shrink-0">
                        <label
                            class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                            <input type="radio" name="status" id="" value="On Going"
                                class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                            <span
                                class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                                On Going
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
                            <input type="radio" name="status" id="" value="Completed"
                                class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                            <span
                                class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                                Completed
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
                <hr class="border-desa-background" />
                <section id="Tanggal-Pembangunan" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal Pembangunan</p>
                    <div class="flex items-center gap-6 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input required type="date" id="birthdate" name="tanggal_pembangunan"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black p-4 pl-12 gap-2 font-medium invalid:text-desa-secondary transition-all duration-300 [&::-webkit-calendar-picker-indicator]:hidden"
                                onclick="this.showPicker();">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('/assets') }}/images/icons/calendar-2-secondary-green.svg"
                                    class="size-6 hidden group-has-[:invalid]:flex" alt="icon">
                                <img src="{{ asset('/assets') }}/images/icons/calendar-2-black.svg"
                                    class="size-6 flex group-has-[:invalid]:hidden" alt="icon">
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Hari" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Hari yang dibutuhkan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="number" placeholder="Ketik hari yang dibutuhkan" name="hari"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 pr-[98px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('/assets') }}/images/icons/timer-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('/assets') }}/images/icons/timer-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                            </div>
                            <div class="absolute transform -translate-y-1/2 top-1/2 right-4 flex shrink-0 gap-6">
                                <div class="w-px h-6 border border-desa-background"></div>
                                <span
                                    class="font-medium leading-5 text-desa-dark-green group-has-[:placeholder-shown]:text-desa-secondary">Hari</span>
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Deskripsi" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi Pembangunan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <textarea name="deskripsi" id="" placeholder="Jelaskan lebih detail tentang pembangunan" rows="6"
                            class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300"></textarea>
                    </div>
                </section>
                <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />
                <section id="Buttons" class="flex items-center justify-end gap-4">
                    <a href="{{ route('development.index') }}">
                        <div
                            class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                            Batal, Tidak jadi</div>
                    </a>
                    <button disabled id="submitButton" type="submit"
                        class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">Create
                        Now</button>
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
