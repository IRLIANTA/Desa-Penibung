@extends('admin.layouts.app')
@section('content')
    <!-- Penerima Pesan -->
    <div class="flex flex-col flex-1 p-6 bg-desa-foreshadow/30 min-h-screen">

        <!-- Header -->
        <div id="Header" class="flex flex-col gap-2 mb-16">
            <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                <p class="text-desa-dark-green font-semibold capitalize">Feedback Masukan</p>
                <span>/</span>
                <p class="text-desa-dark-green font-semibold capitalize">Penerima Pesan</p>
            </div>
            <h1 class="font-semibold text-2xl">Detail Feedback Masukan</h1>
        </div>

        <!-- Form Penerima -->
        <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
            <div class="max-w-3xl w-full mx-auto bg-white rounded-2xl shadow p-8 mt-6">
                <form class="flex flex-col gap-4">
                
                    <!-- Nama -->
                    <div class="flex flex-col gap-2">
                        <label for="nama" class="font-medium text-desa-secondary">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ $message->nama ?? '' }}" readonly
                            class="w-full border border-desa-background rounded-xl p-3 bg-desa-foreshadow/50 focus:outline-none transition">
                    </div>
                
                    <!-- Alamat -->
                    <div class="flex flex-col gap-2">
                        <label for="alamat" class="font-medium text-desa-secondary">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ $message->alamat ?? '' }}" readonly
                            class="w-full border border-desa-background rounded-xl p-3 bg-desa-foreshadow/50 focus:outline-none transition">
                    </div>
                
                    <!-- Nomor WhatsApp -->
                    <div class="flex flex-col gap-2">
                        <label for="wa" class="font-medium text-desa-secondary">Nomor WhatsApp</label>
                        <input type="text" id="wa" name="wa" value="{{ $message->wa ?? '' }}" readonly
                            class="w-full border border-desa-background rounded-xl p-3 bg-desa-foreshadow/50 focus:outline-none transition">
                    </div>
                
                    <!-- Tanggal -->
                    <div class="flex flex-col gap-2">
                        <label for="tanggal" class="font-medium text-desa-secondary">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ $message->tanggal ?? '' }}" readonly
                            class="w-full border border-desa-background rounded-xl p-3 bg-desa-foreshadow/50 focus:outline-none transition">
                    </div>
                
                    <!-- Laporan -->
                    <div class="flex flex-col gap-2">
                        <label for="laporan" class="font-medium text-desa-secondary">Isi Laporan</label>
                        <textarea id="laporan" name="laporan" rows="5" readonly
                            class="w-full border border-desa-background rounded-xl p-3 bg-desa-foreshadow/50 focus:outline-none transition">{{ $message->laporan ?? '' }}</textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
