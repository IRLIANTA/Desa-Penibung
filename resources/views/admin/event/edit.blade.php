@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div id="Header" class="flex items-center justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Events Desa</p>
                    <span>/</span>
                    <p class="last-of-type:text-desa-dark-green last-of-type:font-semibold capitalize ">Ubah Event Desa</p>
                </div>
                <h1 class="font-semibold text-2xl">Ubah Event Desa</h1>
            </div>
        </div>
        <form action="kd-bantuan-sosial.html" id="myForm" class="capitalize">
            <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
                <section id="Thumbnail" class="flex items-center justify-between">
                    <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Thumbnail Event Terkait
                    </h2>
                    <div class="flex-1 flex items-center justify-between">
                        <div id="Photo-Preview"
                            class="flex itce justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                            <img id="Photo" src="{{ asset('/assets') }}/images/thumbnails/thumbnail-bansos-preview.svg" alt="image"
                                class="size-full object-cover" />
                        </div>
                        <div class="relative">
                            <input required id="File" type="file" name="file"
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
                <section id="Nama-Event" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Event</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="text" value="Belajar HTML Dasar Bersama" placeholder="Ketik nama event terkait"
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
                <section id="Status" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pilih status event</p>
                    <div class="flex flex-1 gap-6 shrink-0">
                        <label
                            class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2 has-[:checked]:ring-none has-[:checked]:bg-desa-foreshadow transition-setup">
                            <input type="radio" checked name="status" id=""
                                class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                            <span
                                class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                                Open
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
                            <input type="radio" name="status" id=""
                                class="flex size-[18px] shrink-0 accent-desa-secondary checked:accent-desa-dark-green transition-setup">
                            <span
                                class="font-medium leading-5 text-desa-secondary w-full group-has-[:checked]:text-desa-dark-green transition-setup">
                                Closed
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
                <section id="Harga-Event" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Harga Event</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="number" value="250000" placeholder="Ketik total harga event"
                                class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 pr-12 [&:placeholder-shown]:pl-12 pl-[70px] gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                            <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                                <img src="{{ asset('/assets') }}/images/icons/dollar-square-secondary-green.svg"
                                    class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                                <img src="{{ asset('/assets') }}/images/icons/dollar-square-black.svg"
                                    class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                                <span
                                    class="text-desa-black ml-2 opacity-100 group-has-[:placeholder-shown]:opacity-0 transition-setup">Rp</span>
                            </div>
                        </label>
                    </div>
                </section>
                <hr class="border-desa-background" />
                <section id="Tanggal" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal event dilakukan</p>
                    <div class="flex items-center gap-6 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input required type="date" value="217-01-01" id="birthdate"
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
                <section id="Waktu" class="flex items-center justify-between">
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Waktu event dilakukan</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <label class="relative group peer w-full">
                            <input type="number" value="12" placeholder="Ketik waktu event"
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
                    <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi event terkait</p>
                    <div class="flex flex-col gap-3 flex-1 shrink-0">
                        <textarea name="" id="" placeholder="Jelaskan lebih detail tentang event" rows="6"
                            class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, quisquam!
                                    </textarea>
                    </div>
                </section>
                <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />
                <section id="Buttons" class="flex items-center justify-end gap-4">
                    <a href="{{ route('event.index') }}">
                        <div
                            class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                            Batal, Tidak jadi</div>
                    </a>
                    <button disabled id="submitButton" type="submit"
                        class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">Save
                        Changes</button>
                </section>
            </div>
        </form>
    </div>
@endsection
