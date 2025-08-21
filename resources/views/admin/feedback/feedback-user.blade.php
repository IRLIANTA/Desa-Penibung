@extends('admin.layouts.app')
@section('content')
    @push('styles')
        <style>
            .table-container {
                background: white;
                border: 1px solid #e5e7eb;
            }

            .btn-primary {
                background: #3b82f6;
                transition: all 0.2s ease;
            }

            .btn-primary:hover {
                background: #2563eb;
            }

            .btn-success {
                background: #10b981;
            }

            .btn-success:hover {
                background: #059669;
            }

            .btn-warning {
                background: #f59e0b;
            }

            .btn-warning:hover {
                background: #d97706;
            }

            .btn-danger {
                background: #ef4444;
            }

            .btn-danger:hover {
                background: #dc2626;
            }

            .status-badge {
                font-size: 0.75rem;
                font-weight: 600;
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
            }

            .status-pending {
                background: #fef3c7;
                color: #92400e;
            }

            .status-proses {
                background: #dbeafe;
                color: #1e40af;
            }

            .status-selesai {
                background: #d1fae5;
                color: #065f46;
            }

            .modal {
                background: rgba(0, 0, 0, 0.5);
            }

            @media (max-width: 768px) {
                .table-responsive {
                    overflow-x: auto;
                }

                .table-responsive table {
                    min-width: 800px;
                }
            }

            .fade-in {
                animation: fadeIn 0.3s ease-in;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        </style>
    @endpush
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Data Feedback</h1>
                <p class="text-gray-600">Kelola semua laporan yang masuk dari masyarakat</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Laporan</p>
                            <p class="text-2xl font-bold text-gray-800" id="totalLaporan">0</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Belum Dibaca</p>
                            <p class="text-2xl font-bold text-red-600" id="belumDibacaCount">0</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Sudah Dibaca</p>
                            <p class="text-2xl font-bold text-blue-600" id="sudahDibacaCount">0</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Sudah Diselesaikan</p>
                            <p class="text-2xl font-bold text-green-600" id="sudahDiselesaikanCount">0</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Search -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" id="searchInput" placeholder="Cari nama atau isi laporan..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <select id="statusFilter"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 outline-none">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="proses">Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    {{-- <div>
                        <button onclick="exportData()"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            Export Excel
                        </button>
                    </div> --}}
                </div>
            </div>

            <!-- Table -->
            <div class="table-container rounded-lg shadow">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">                            
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Alamat</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        WhatsApp</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Isi Laporan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mark</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                        </thead>
                        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                            {{-- ajax bang --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-700">
                    Menampilkan <span id="showingStart">0</span> sampai <span id="showingEnd">0</span> dari <span
                        id="totalRows">0</span> data
                </div>
                <div class="flex space-x-2" id="pagination">
                    <!-- Pagination buttons akan dimuat di sini -->
                </div>
            </div>
        </div>

        <!-- Detail + Status Modal -->
        <div id="detailModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
            style="z-index: 999;">
            <div class="bg-white rounded-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">Detail Feedback</h2>
                <div id="detailContent" class="space-y-2"></div>

                <!-- Form ubah status -->
                <div class="mt-4 border-t pt-4">
                    <label class="block text-sm font-medium mb-1">Ubah Status</label>
                    <select id="newStatus" class="w-full border rounded p-2 mb-3">
                        <option value="pending">Pending</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    <button onclick="updateStatus()"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>

                <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('detailModal')"
                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                        Tutup
                    </button>
                </div>
            </div>
        </div>


    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let searchInput = document.getElementById("searchInput");
                let statusFilter = document.getElementById("statusFilter");
                let tableBody = document.getElementById("tableBody");
                let pagination = document.getElementById("pagination");
                let showingStart = document.getElementById("showingStart");
                let showingEnd = document.getElementById("showingEnd");
                let totalRows = document.getElementById("totalRows");

                // load widget 
                function loadWidgetData() {
                    fetch('/feedback/widget-data')
                        .then(res => res.json())
                        .then(data => {
                            document.getElementById('totalLaporan').textContent = data.total;
                            document.getElementById('belumDibacaCount').textContent = data.belumDibaca;
                            document.getElementById('sudahDibacaCount').textContent = data.sudahDibaca;
                            document.getElementById('sudahDiselesaikanCount').textContent = data.sudahDiselesaikan;
                        })
                        .catch(err => console.error(err));
                }

                //  fetchData tabel 
                window.fetchData = function(page = 1) {
                    let search = searchInput.value;
                    let status = statusFilter.value;

                    fetch(`/feedback/getdata?page=${page}&search=${search}&status=${status}`)
                        .then(res => res.json())
                        .then(data => {
                            tableBody.innerHTML = "";
                            if (data.data.length === 0) {
                                tableBody.innerHTML =
                                    `<tr><td colspan="9" class="text-center py-4">Tidak ada data</td></tr>`;
                            } else {
                                data.data.forEach((item, index) => {
                                    let wa = item.no_telp.replace(/^0/, "62");

                                    let visitText = item.visit ? 'Sudah Dibaca' : 'Belum Dibaca';
                                    let visitClass = item.visit ? 'text-blue-600 font-bold' :
                                        'text-red-600 font-bold';

                                    tableBody.innerHTML += `
        <tr class="hover:bg-gray-50" id="row-${item.id}">
            <td class="px-6 py-4 text-sm">${(data.from + index)}</td>
            <td class="px-6 py-4 text-sm font-medium">${item.nama_lengkap}</td>
            <td class="px-6 py-4 text-sm max-w-xs truncate">${item.alamat}</td>
            <td class="px-6 py-4 text-sm">
                <a href="https://wa.me/${wa}" target="_blank" class="text-blue-600 hover:text-blue-800">${item.no_telp}</a>
            </td>
            <td class="px-6 py-4 text-sm max-w-xs truncate">${item.isi}</td>
            <td class="px-6 py-4 text-sm">${new Date(item.created_at).toLocaleString()}</td>
            <td class="px-6 py-4 text-sm">
                ${item.status === 'pending' ? '<span class="status-badge status-pending">Pending</span>' : 
                  item.status === 'selesai' ? '<span class="status-badge status-selesai">Selesai</span>' : '<span class="status-badge">Tidak diketahui</span>'}
            </td>
            <td class="px-6 py-4 text-sm visit-status ${visitClass}">${visitText}</td>
            <td class="px-6 py-4 text-sm space-x-2">
                <button onclick="lihatDetail(${item.id}, '${item.nama_lengkap}', '${item.no_telp}', '${item.isi}', '${item.status}', '${item.created_at}')" class="text-blue-600 hover:text-blue-800">Lihat</button>
            </td>
        </tr>
    `;
                                });

                            }

                            // Pagination Info
                            showingStart.innerText = data.from || 0;
                            showingEnd.innerText = data.to || 0;
                            totalRows.innerText = data.total;

                            // Pagination Buttons
                            pagination.innerHTML = "";
                            for (let i = 1; i <= data.last_page; i++) {
                                pagination.innerHTML += `
                        <button onclick="fetchData(${i})" 
                            class="px-3 py-1 rounded ${i === data.current_page ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300'}">
                            ${i}
                        </button>
                    `;
                            }

                            loadWidgetData();
                        });
                }

                // Event Listeners
                searchInput.addEventListener("keyup", () => fetchData());
                statusFilter.addEventListener("change", () => fetchData());

                // Initial Load
                fetchData();
            });

            let currentId = null;

            function lihatDetail(id, nama, no_telp, isi, status, created_at) {
                currentId = id;
                let wa = no_telp.replace(/^0/, "62");

                let content = `
        <p><strong>Nama:</strong> ${nama}</p>
        <p><strong>No. Telp:</strong> 
            <a href="https://wa.me/${wa}" target="_blank" class="text-blue-600 hover:text-blue-800">${no_telp}</a>
        </p>
        <p><strong>Isi Laporan:</strong><br>${isi}</p>
        <p><strong>Dibuat:</strong> ${new Date(created_at).toLocaleString()}</p>
    `;
                document.getElementById("detailContent").innerHTML = content;
                document.getElementById("newStatus").value = status; // set status
                openModal("detailModal");

                // Mark as Read AJAX
                fetch(`/feedback/${id}/mark-as-read`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            const visitCell = document.querySelector(`#row-${id} .visit-status`);
                            if (visitCell) visitCell.textContent = "Sudah Dibaca";

                            loadWidgetData();
                        }
                    });
            }

            function updateStatus() {
                let newStatus = document.getElementById("newStatus").value;

                fetch(`/feedback/updatestatus/${currentId}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Toast.success(data.message)
                            closeModal("detailModal");
                            fetchData(); // refresh tabel + widget otomatis
                        } else {
                            alert("Gagal update status");
                        }
                    })
                    .catch(err => console.error(err));
            }

            function openModal(id) {
                document.getElementById(id).classList.remove("hidden");
            }

            function closeModal(id) {
                document.getElementById(id).classList.add("hidden");
            }
        </script>
    @endpush
@endsection
