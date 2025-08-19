@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">

        <hr class="border-desa-background" />
        <section id="Jumlah Dusun" class="flex items-center justify-between">
            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah Dusun</p>
            <div class="flex flex-col gap-3 flex-1 shrink-0">
                <label class="relative group peer w-full">
                    <input type="number" placeholder="Masukan total Dusun"
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-secondary-green.svg"
                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-black.svg"
                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                    </div>
                </label>
            </div>
        </section>
        <hr class="border-desa-background" />
        <section id="Jumlah RW" class="flex items-center justify-between">
            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah RW</p>
            <div class="flex flex-col gap-3 flex-1 shrink-0">
                <label class="relative group peer w-full">
                    <input type="number" placeholder="Masukan total RW"
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-secondary-green.svg"
                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-black.svg"
                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                    </div>
                </label>
            </div>
        </section>
        <hr class="border-desa-background" />
        <section id="Jumlah RT" class="flex items-center justify-between">
            <p class="font-medium leading-5 text-desa-secondary w-[calc(424/904*100%)]">Jumlah RT</p>
            <div class="flex flex-col gap-3 flex-1 shrink-0">
                <label class="relative group peer w-full">
                    <input type="number" placeholder="Masukan total RT"
                        class="appearance-none outline-none w-full h-14 rounded-2xl ring-[1.5px] ring-desa-background focus:ring-desa-black py-4 px-12 gap-2 font-medium placeholder:text-desa-secondary transition-all duration-300">
                    <div class="absolute transform -translate-y-1/2 top-1/2 left-4 flex size-6 shrink-0">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-secondary-green.svg"
                            class="size-6 hidden group-has-[:placeholder-shown]:flex" alt="icon">
                        <img src="{{ asset('assets/') }}/images/icons/profile-2user-black.svg"
                            class="size-6 flex group-has-[:placeholder-shown]:hidden" alt="icon">
                    </div>
                </label>
            </div>
        </section>
        </section>
        <hr class="border-desa-background w-[calc(100%+48px)] -mx-6" />
        <section id="Buttons" class="flex items-center justify-end gap-4">
            <a href="{{ route('dashboard.index') }}">
                <div
                    class="py-[18px] rounded-2xl bg-desa-red w-[180px] text-center flex justify-center font-medium text-white">
                    Batal, Tidak jadi</div>
            </a>
            <button disabled id="submitButton" type="submit"
                class="py-[18px] rounded-2xl disabled:bg-desa-grey w-[180px] text-center flex justify-center font-medium text-white bg-desa-dark-green transition-all duration-300">Save
                Changes</button>
        </section>
    </div>
@endsection
