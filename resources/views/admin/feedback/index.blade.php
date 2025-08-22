@extends('admin.layouts.app')
@section('content')
    @push('styles')
        <style>
            .form-container {
                background: white;
                border: 1px solid #e5e7eb;
            }
            .input-focus:focus {
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
                border-color: #3b82f6;
            }
            .btn-primary {
                background: #34613a;
                transition: all 0.2s ease;
            }
            .btn-primary:hover {
                background: #254629;
            }
            .icon-container {
                background: #34613a;
            }
        </style>
    @endpush

    <div class="flex flex-col gap-3 px-2 sm:gap-3.5 sm:px-4">
            <div class="text-center mb-8">
                <div class="icon-container mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl mb-2">Berikan Laporan Anda</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Masukan dan laporan Anda sangat berharga untuk membantu kami meningkatkan kualitas layanan</p>
            </div>

            <div class="form-container w-full max-w-8xl mx-auto rounded-2xl shadow-lg p-4 sm:p-6 md:p-8">
                <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="#34613a" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Personal
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                                <input type="text" id="nama" name="nama_lengkap" required class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition-all duration-200 input-focus focus:ring-0" placeholder="Masukkan nama lengkap Anda">
                            </div>
                            <div class="space-y-2">
                                <label for="wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp *</label>
                                <input type="tel" id="wa" name="no_telp" required class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition-all duration-200 input-focus focus:ring-0" placeholder="081234567890">
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat *</label>
                                <input type="text" id="alamat" name="alamat" required class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition-all duration-200 input-focus focus:ring-0" placeholder="Masukkan alamat lengkap">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="#34613a" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Isi Laporan
                        </h2>
                        <div class="space-y-2">
                            <label for="laporan" class="block text-sm font-medium text-gray-700">Detail Laporan/Feedback *</label>
                            <textarea id="laporan" name="isi" rows="6" required class="w-full resize-none rounded-lg border border-gray-300 px-4 py-3 outline-none transition-all duration-200 input-focus focus:ring-0" placeholder="Tuliskan laporan, keluhan, saran, atau feedback Anda di sini secara detail..."></textarea>
                            <div class="text-right text-sm text-gray-500">
                                <span id="charCount">0</span>/500 karakter
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse gap-4 pt-6 sm:flex-row">
                        <button type="button" onclick="resetForm()" class="flex-1 rounded-lg border border-gray-300 px-6 py-3 font-medium text-gray-700 transition-all duration-200 hover:bg-gray-50 sm:flex-none">
                            Reset Form
                        </button>
                        <button type="submit" id="submitButton" class="btn-primary flex flex-1 items-center justify-center rounded-lg px-8 py-3 font-semibold text-white sm:flex-none">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>

            <div id="successModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                <div class="m-4 w-full max-w-md rounded-2xl bg-white p-8 text-center">
                    <div class="icon-container mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-gray-800">Laporan Terkirim!</h3>
                    <p class="mb-6 text-gray-600">Terima kasih atas laporan Anda. Tim kami akan meninjau masukan Anda untuk perbaikan website.</p>
                    <button onclick="closeModal()" class="btn-primary rounded-xl px-6 py-2 font-medium text-white">
                        Tutup
                    </button>
                </div>
            </div>
    </div>

    @push('scripts')
        <script>
            const waInput = document.getElementById('wa');
            const waError = document.getElementById('waError');
            const charCount = document.getElementById('charCount');
            const laporanTextarea = document.getElementById('laporan');
            const successModal = document.getElementById('successModal');
            const feedbackForm = document.getElementById('feedbackForm');

            laporanTextarea.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;
                charCount.classList.toggle('text-red-500', count > 450);
            });

            function resetForm() {
                feedbackForm.reset();
                charCount.textContent = "0";
                charCount.classList.remove('text-red-500');
            }

            function closeModal() {
                successModal.classList.add('hidden');
                resetForm();
            }

            window.closeModal = closeModal;
            window.resetForm = resetForm;
        </script>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('successModal').classList.remove('hidden');
                });
            </script>
        @endif
    @endpush
@endsection