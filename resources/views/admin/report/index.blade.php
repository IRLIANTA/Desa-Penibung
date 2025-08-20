@extends('admin.layouts.app')
@section('content')
    <!-- Form Feedback -->
            <div class="flex flex-col flex-1 p-6 bg-desa-foreshadow/30 min-h-screen">

                <!-- Header -->
                <div id="Header" class="flex items-center justify-between">
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-1 items-center leading-5 text-desa-secondary">
                            <p class="text-desa-dark-green font-semibold capitalize">Feedback Masukan</p>
                            <span>/</span>
                            <p class="text-desa-dark-green font-semibold capitalize">Tambah Feedback Masukan</p>
                        </div>
                        <h1 class="font-semibold text-2xl">Tambah Feedback Masukan</h1>
                    </div>
                </div>

                <!-- Form -->
                <div class="shrink-0 rounded-3xl p-6 bg-white flex flex-col gap-6 h-fit">
                    <div class="max-w-3xl w-full mx-auto bg-white rounded-2xl shadow p-8 mt-6">
                        <form action="#" method="POST" class="flex flex-col gap-4">
                    
                            <!-- Nama -->
                            <div class="flex flex-col gap-2">
                                <label for="nama" class="font-medium text-desa-secondary">Nama</label>
                                <input type="text" id="nama" name="nama"
                                    class="w-full border border-desa-background rounded-xl p-3 focus:border-desa-dark-green outline-none transition"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                    
                            <!-- Alamat -->
                            <div class="flex flex-col gap-2">
                                <label for="alamat" class="font-medium text-desa-secondary">Alamat</label>
                                <input type="text" id="alamat" name="alamat"
                                    class="w-full border border-desa-background rounded-xl p-3 focus:border-desa-dark-green outline-none transition"
                                    placeholder="Masukkan alamat lengkap">
                            </div>
                    
                            <!-- Nomor WhatsApp -->
                            <div class="flex flex-col gap-2">
                                <label for="wa" class="font-medium text-desa-secondary">Nomor WhatsApp</label>
                                <input type="text" id="wa" name="wa"
                                    class="w-full border border-desa-background rounded-xl p-3 focus:border-desa-dark-green outline-none transition"
                                    placeholder="Contoh: 081234567890">
                            </div>
                    
                            <!-- Tanggal -->
                            <div class="flex flex-col gap-2">
                                <label for="tanggal" class="font-medium text-desa-secondary">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal"
                                    class="w-full border border-desa-background rounded-xl p-3 focus:border-desa-dark-green outline-none transition">
                            </div>
                    
                            <!-- Laporan -->
                            <div class="flex flex-col gap-2">
                                <label for="laporan" class="font-medium text-desa-secondary">Isi Laporan</label>
                                <textarea id="laporan" name="laporan" rows="5"
                                    class="w-full border border-desa-background rounded-xl p-3 focus:border-desa-dark-green outline-none transition"
                                    placeholder="Tuliskan laporan atau feedback Anda di sini..."></textarea>
                            </div>
                    
                            <!-- Tombol Submit -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="px-6 py-3 rounded-xl bg-desa-dark-green text-white font-semibold hover:bg-desa-secondary transition">
                                    Kirim Laporan
                                </button>
                            </div>
                    
                        </form>
                    </div>

                </div>
            </div>
@endsection