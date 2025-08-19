@extends('admin.layouts.app')
@section('content')
    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" id="myForm" class="capitalize">
        @csrf
        <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
            {{-- Thumbnail --}}
            <section id="Thumbnail" class="flex items-center justify-between">
                <h2 class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Thumbnail Event Terkait</h2>
                <div class="flex-1 flex items-center justify-between">
                    <div id="Photo-Preview"
                        class="flex itce justify-center w-[120px] h-[100px] rounded-2xl overflow-hidden bg-desa-foreshadow">
                        <img id="Photo" src="{{ asset('/assets/images/thumbnails/thumbnail-bansos-preview.svg') }}"
                            alt="image" class="size-full object-cover" />
                    </div>
                    <div class="relative">
                        <input required id="File" type="file" name="thumbnail"
                            class="absolute opacity-0 left-0 w-full top-0 h-full" />
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
            <section id="Nama-Event" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Nama Event</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input type="text" name="name" placeholder="Ketik nama event terkait"
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Status --}}
            <section id="Status" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Pilih status event</p>
                <div class="flex flex-1 gap-6 shrink-0">
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2">
                        <input type="radio" name="status" value="Open" class="hidden peer" checked>
                        <span
                            class="font-medium leading-5 text-desa-secondary peer-checked:text-desa-dark-green">Open</span>
                    </label>
                    <label
                        class="group flex w-full items-center h-14 rounded-2xl p-4 ring-[1.5px] ring-desa-background gap-2">
                        <input type="radio" name="status" value="Closed" class="hidden peer">
                        <span
                            class="font-medium leading-5 text-desa-secondary peer-checked:text-desa-dark-green">Closed</span>
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Tanggal --}}
            <section id="Tanggal" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Tanggal event dilakukan</p>
                <div class="flex items-center gap-6 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input required type="date" name="date"
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black p-4 pl-12">
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Start Time --}}
            <section id="Waktu" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Waktu event dilakukan</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <label class="relative group peer w-full">
                        <input type="time" name="start_time"
                            class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 font-medium">
                    </label>
                </div>
            </section>

            <hr class="border-desa-background" />

            {{-- Deskripsi --}}
            <section id="Deskripsi" class="flex items-center justify-between">
                <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Deskripsi event terkait</p>
                <div class="flex flex-col gap-3 flex-1 shrink-0">
                    <textarea name="description" placeholder="Jelaskan lebih detail tentang event" rows="6"
                        class="appearance-none outline-none w-full rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-4 font-medium placeholder:text-desa-secondary"></textarea>
                </div>
            </section>

            <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />

            {{-- Buttons --}}
            <section id="Buttons" class="flex items-center justify-end gap-4">
                <a href="{{ route('event.index') }}">
                    <div
                        class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                        Batal, Tidak jadi</div>
                </a>
                <button id="submitButton" type="submit"
                    class="py-[18px] rounded-2xl w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">
                    Create Now
                </button>
            </section>
        </div>
    </form>
@endsection
