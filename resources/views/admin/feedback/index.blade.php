@extends('admin.layouts.app')
@section('content')
    @push('styles')
        <style>
            .form-container {
                background: white;
                border: 1px solid #e5e7eb;
            }

            .input-focus:focus {
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
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

            .feedback-card {
                transition: all 0.2s ease;
            }
        </style>
    @endpush
    <!-- Form Feedback -->
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div class="flex flex-col flex-1 p-6 bg-desa-foreshadow/30 min-h-screen">

            <!-- Header -->
            <div class="text-center mb-8 fade-in-up">
                <div class="icon-container w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Berikan Laporan Anda</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Masukan dan laporan Anda sangat berharga untuk membantu kami
                    meningkatkan kualitas layanan</p>
            </div>
            <!-- Form -->
            <div class="form-container bg-white rounded-2xl shadow-lg p-8 feedback-card fade-in-up stagger-1">
                <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Personal Information Section -->
                    <div class="border-b border-gray-200 pb-6 fade-in-up stagger-2">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="#34613a" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Personal
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                                <input type="text" id="nama" name="nama_lengkap" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 input-focus transition-all duration-200 focus:border-blue-500 focus:ring-0 outline-none"
                                    placeholder="Masukkan nama lengkap Anda">
                            </div>

                            <div class="space-y-2">
                                <label for="wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp
                                    *</label>
                                <input type="tel" id="wa" name="no_telp" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 input-focus transition-all duration-200 focus:border-blue-500 focus:ring-0 outline-none"
                                    placeholder="081234567890">
                                <p id="waError" class="mt-1 text-sm text-red-500 hidden"></p>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat *</label>
                                <input type="text" id="alamat" name="alamat" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 input-focus transition-all duration-200 focus:border-blue-500 focus:ring-0 outline-none"
                                    placeholder="Masukkan alamat lengkap">
                            </div>
                        </div>
                    </div>

                    <!-- Feedback Section -->
                    <div class="fade-in-up stagger-3">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="#34613a" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Isi Laporan
                        </h2>

                        <!-- Feedback Text -->
                        <div class="space-y-2">
                            <label for="laporan" class="block text-sm font-medium text-gray-700">Detail Laporan/Feedback
                                *</label>
                            <textarea id="laporan" name="isi" rows="6" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 input-focus transition-all duration-200 focus:border-blue-500 focus:ring-0 outline-none resize-none"
                                placeholder="Tuliskan laporan, keluhan, saran, atau feedback Anda di sini secara detail..."></textarea>
                            <div class="text-sm text-gray-500 text-right">
                                <span id="charCount">0</span>/500 karakter
                            </div>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 fade-in-up stagger-4">
                        <button type="button" onclick="resetForm()"
                            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200 flex-1 sm:flex-none">
                            Reset Form
                        </button>
                        <button type="submit" id="submitButton"
                            class="btn-primary px-8 py-3 rounded-lg text-white font-semibold flex-1 sm:flex-none flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>

            <div id="successModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-2xl p-8 m-4 max-w-md w-full text-center success-animation">
                    <div class="icon-container w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Laporan Terkirim!</h3>
                    <p class="text-gray-600 mb-6">Terima kasih atas laporan Anda. Tim kami akan meninjau masukan Anda untuk
                        perbaikan website.</p>
                    <button onclick="closeModal()" class="btn-primary px-6 py-2 rounded-xl text-white font-medium">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
    const waInput = document.getElementById('wa');
    const waError = document.getElementById('waError');
    const charCount = document.getElementById('charCount');
    const laporanTextarea = document.getElementById('laporan');
    const feedbackForm = document.getElementById('feedbackForm'); // ganti unik
    const feedbackSubmitBtn = feedbackForm.querySelector("button[type='submit']");

    // Counter karakter laporan
    laporanTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;

        if (count > 450) {
            charCount.classList.add('text-red-500');
        } else {
            charCount.classList.remove('text-red-500');
        }
    });

    // Enable/disable tombol submit
    const checkInputs = () => {
        const inputs = feedbackForm.querySelectorAll("input[required], textarea[required]");
        const allFilled = Array.from(inputs).every(
            (input) => input.value.trim() !== ""
        );
        feedbackSubmitBtn.disabled = !allFilled;
    };

    feedbackForm.querySelectorAll("input[required], textarea[required]").forEach((input) => {
        input.addEventListener("input", checkInputs);
    });

    checkInputs(); // cek awal

    // Validasi WA saat submit
    feedbackForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const wa = waInput.value.trim();
        const regex = /^08[0-9]{8,13}$/; // mulai 08, panjang 10-15 digit

        if (!regex.test(wa)) {
            waError.textContent = "Nomor WhatsApp tidak valid. Format: 081234567890 (10-15 digit).";
            waError.classList.remove('hidden');
            waInput.classList.add("border-red-500");
            return;
        } else {
            waError.textContent = "";
            waError.classList.add('hidden');
            waInput.classList.remove("border-red-500");
        }

        // Jika lolos validasi -> submit atau tampilkan modal sukses
        alert("Form berhasil dikirim!");
    });
</script>
@endsection
