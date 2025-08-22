@extends('admin.layouts.app')
@section('content')
    @push('styles')
        <style>
            .table-container {
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                overflow: hidden;
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
                display: inline-block;
                white-space: nowrap;
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

            /* Mobile Table Styles */
            @media (max-width: 768px) {
                .desktop-table {
                    display: none;
                }

                .mobile-card-container {
                    display: block;
                }

                .feedback-card {
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    margin-bottom: 1rem;
                    padding: 1rem;
                    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
                }

                .card-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 0.75rem;
                    padding-bottom: 0.75rem;
                    border-bottom: 1px solid #e5e7eb;
                }

                .card-title {
                    font-weight: 600;
                    color: #1f2937;
                    font-size: 1rem;
                }

                .card-subtitle {
                    font-size: 0.875rem;
                    color: #6b7280;
                    margin-top: 0.25rem;
                }

                .card-content {
                    space-y: 0.5rem;
                }

                .card-field {
                    display: flex;
                    margin-bottom: 0.5rem;
                }

                .card-label {
                    font-weight: 500;
                    color: #374151;
                    width: 80px;
                    flex-shrink: 0;
                    font-size: 0.875rem;
                }

                .card-value {
                    color: #1f2937;
                    flex: 1;
                    font-size: 0.875rem;
                    word-break: break-word;
                }

                .card-actions {
                    margin-top: 0.75rem;
                    padding-top: 0.75rem;
                    border-top: 1px solid #e5e7eb;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .visit-badge {
                    font-size: 0.75rem;
                    font-weight: 500;
                    padding: 0.25rem 0.5rem;
                    border-radius: 4px;
                }

                .visit-read {
                    background: #dbeafe;
                    color: #1e40af;
                }

                .visit-unread {
                    background: #fee2e2;
                    color: #dc2626;
                }

                .stats-grid {
                    grid-template-columns: 1fr 1fr !important;
                    gap: 0.75rem !important;
                }

                .stat-card {
                    padding: 1rem !important;
                }

                .stat-text {
                    font-size: 1.25rem !important;
                }

                .filter-container {
                    flex-direction: column !important;
                    gap: 0.75rem !important;
                }

                .filter-input,
                .filter-select {
                    width: 100% !important;
                }

                .pagination-container {
                    flex-direction: column !important;
                    gap: 1rem !important;
                    text-align: center;
                }
            }

            @media (min-width: 769px) {
                .mobile-card-container {
                    display: none;
                }

                .desktop-table {
                    display: table;
                }

                .table-responsive {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }

                .table-responsive table {
                    min-width: 1000px;
                }
            }

            /* Improved table styles */
            .custom-table {
                width: 100%;
                border-collapse: collapse;
                /* REFACTOR: Ditambahkan untuk membuat lebar kolom lebih konsisten */
                table-layout: fixed;
            }

            .custom-table th {
                background: #f9fafb;
                padding: 0.75rem;
                text-align: left;
                font-size: 0.75rem;
                font-weight: 600;
                color: #374151;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                border-bottom: 1px solid #e5e7eb;
                white-space: nowrap;
            }

            .custom-table td {
                padding: 0.75rem;
                border-bottom: 1px solid #f3f4f6;
                vertical-align: top;
                font-size: 0.875rem;
                /* REFACTOR: Memastikan teks yang panjang tidak merusak layout */
                word-break: break-word;
            }

            .custom-table tr:hover {
                background: #f9fafb;
            }

            .table-cell-content {
                /* REFACTOR: max-width dihilangkan agar lebih fleksibel */
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .table-cell-expandable {
                cursor: pointer;
            }

            .table-cell-expandable:hover {
                color: #3b82f6;
            }
        </style>
    @endpush
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">

        <div class="grid ">

            <div class="mb-6 lg:mb-8">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Data Feedback</h1>
                <p class="text-sm lg:text-base text-gray-600">Kelola semua laporan yang masuk dari masyarakat</p>
            </div>

            <div class="stats-grid grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4 mb-6 lg:mb-8">
                <div class="stat-card bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs lg:text-sm text-gray-600">Total Laporan</p>
                            <p class="stat-text text-xl lg:text-2xl font-bold text-gray-800" id="totalLaporan">0</p>
                        </div>
                        <div class="bg-blue-100 p-2 lg:p-3 rounded-full">
                            <svg class="w-4 h-4 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs lg:text-sm text-gray-600">Belum Dibaca</p>
                            <p class="stat-text text-xl lg:text-2xl font-bold text-red-600" id="belumDibacaCount">0</p>
                        </div>
                        <div class="bg-red-100 p-2 lg:p-3 rounded-full">
                            <svg class="w-4 h-4 lg:w-6 lg:h-6 text-red-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs lg:text-sm text-gray-600">Sudah Dibaca</p>
                            <p class="stat-text text-xl lg:text-2xl font-bold text-blue-600" id="sudahDibacaCount">0</p>
                        </div>
                        <div class="bg-blue-100 p-2 lg:p-3 rounded-full">
                            <svg class="w-4 h-4 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-lg shadow p-4 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs lg:text-sm text-gray-600">Sudah Diselesaikan</p>
                            <p class="stat-text text-xl lg:text-2xl font-bold text-green-600" id="sudahDiselesaikanCount">0
                            </p>
                        </div>
                        <div class="bg-green-100 p-2 lg:p-3 rounded-full">
                            <svg class="w-4 h-4 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 lg:p-6 mb-6 lg:mb-8">
                <div class="filter-container flex flex-col lg:flex-row gap-3 lg:gap-4">
                    <div class="flex-1">
                        <input type="text" id="searchInput" placeholder="Cari nama atau isi laporan..."
                            class="filter-input w-full border border-gray-300 rounded-lg px-3 lg:px-4 py-2 text-sm lg:text-base focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <select id="statusFilter"
                            class="filter-select border border-gray-300 rounded-lg px-3 lg:px-4 py-2 text-sm lg:text-base focus:border-blue-500 outline-none">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="proses">Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-container desktop-table">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>WhatsApp</th>
                                <th>Isi Laporan</th>
                                <th class="w-28 text-center">Status</th>
                                <th class="w-24 text-center">Mark</th>
                                <th class="w-24 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            </tbody>
                    </table>
                </div>
            </div>

            <div class="mobile-card-container">
                <div id="mobileCardsContainer">
                    </div>
            </div>

            <div class="pagination-container flex flex-col lg:flex-row items-center justify-between mt-6 gap-4">
                <div class="text-xs lg:text-sm text-gray-700">
                    Menampilkan <span id="showingStart">0</span> sampai <span id="showingEnd">0</span> dari <span
                        id="totalRows">0</span> data
                </div>
                <div class="flex flex-wrap justify-center gap-2" id="pagination">
                    </div>
            </div>
        </div>
    </div>

    <div id="detailModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden px-4"
        style="z-index: 999;">
        <div class="bg-white rounded-lg p-4 lg:p-6 w-full max-w-md max-h-[90vh] overflow-y-auto">
            <h2 class="text-lg font-bold mb-4">Detail Feedback</h2>
            <div id="detailContent" class="space-y-2 mb-4"></div>

            <div class="border-t pt-4">
                <label class="block text-sm font-medium mb-2">Ubah Status</label>
                <select id="newStatus" class="w-full border rounded-lg p-2 mb-3 text-sm">
                    <option value="pending">Pending</option>
                    <option value="selesai">Selesai</option>
                </select>
                <button onclick="updateStatus()"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 mb-3 text-sm">
                    Simpan Perubahan
                </button>
            </div>

            <div class="flex justify-end">
                <button onclick="closeModal('detailModal')"
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let searchInput = document.getElementById("searchInput");
                let statusFilter = document.getElementById("statusFilter");
                let tableBody = document.getElementById("tableBody");
                let mobileCardsContainer = document.getElementById("mobileCardsContainer");
                let pagination = document.getElementById("pagination");
                let showingStart = document.getElementById("showingStart");
                let showingEnd = document.getElementById("showingEnd");
                let totalRows = document.getElementById("totalRows");

                // Load widget data
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

                // Generate mobile card HTML
                function generateMobileCard(item, index, from) {
                    let wa = item.no_telp.replace(/^0/, "62");
                    let visitText = item.visit ? 'Sudah Dibaca' : 'Belum Dibaca';
                    let visitClass = item.visit ? 'visit-read' : 'visit-unread';

                    let statusBadge = '';
                    if (item.status === 'pending') {
                        statusBadge = '<span class="status-badge status-pending">Pending</span>';
                    } else if (item.status === 'selesai') {
                        statusBadge = '<span class="status-badge status-selesai">Selesai</span>';
                    } else {
                        statusBadge = '<span class="status-badge">Tidak diketahui</span>';
                    }

                    return `
                        <div class="feedback-card" id="card-${item.id}">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">#${from + index} - ${item.nama_lengkap}</div>
                                    <div class="card-subtitle">${new Date(item.created_at).toLocaleString()}</div>
                                </div>
                                ${statusBadge}
                            </div>
                            
                            <div class="card-content">
                                <div class="card-field">
                                    <div class="card-label">Alamat:</div>
                                    <div class="card-value">${item.alamat}</div>
                                </div>
                                <div class="card-field">
                                    <div class="card-label">WhatsApp:</div>
                                    <div class="card-value">
                                        <a href="https://wa.me/${wa}" target="_blank" class="text-blue-600 hover:text-blue-800">${item.no_telp}</a>
                                    </div>
                                </div>
                                <div class="card-field">
                                    <div class="card-label">Laporan:</div>
                                    <div class="card-value">${item.isi.length > 100 ? item.isi.substring(0, 100) + '...' : item.isi}</div>
                                </div>
                            </div>
                            
                            <div class="card-actions">
                                <span class="visit-badge ${visitClass}">${visitText}</span>
                                <button onclick="lihatDetail(${item.id}, '${item.nama_lengkap.replace(/'/g, "\\'")}', '${item.no_telp}', '${item.isi.replace(/'/g, "\\'")}', '${item.status}', '${item.created_at}')" 
                                    class="px-3 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    `;
                }

                // Fetch data for table
                window.fetchData = function(page = 1) {
                    let search = searchInput.value;
                    let status = statusFilter.value;

                    fetch(`/feedback/getdata?page=${page}&search=${search}&status=${status}`)
                        .then(res => res.json())
                        .then(data => {
                            // Clear both desktop table and mobile cards
                            tableBody.innerHTML = "";
                            mobileCardsContainer.innerHTML = "";

                            if (data.data.length === 0) {
                                tableBody.innerHTML =
                                    `<tr><td colspan="7" class="text-center py-4">Tidak ada data</td></tr>`;
                                mobileCardsContainer.innerHTML =
                                    '<div class="text-center py-8 text-gray-500">Tidak ada data</div>';
                            } else {
                                // Generate desktop table rows
                                data.data.forEach((item, index) => {
                                    let wa = item.no_telp.replace(/^0/, "62");
                                    let visitText = item.visit ? '✓✓' : '✓';
                                    let visitClass = item.visit ? 'text-blue-600 font-bold' :
                                        'text-red-600 font-bold';
                                    
                                    // REFACTOR: Inline style "text-align" diganti dengan class "text-center"
                                    tableBody.innerHTML += `
                                        <tr class="hover:bg-gray-50" id="row-${item.id}">
                                            <td class="font-medium">${item.nama_lengkap}</td>
                                            <td><div class="table-cell-content" title="${item.alamat}">${item.alamat}</div></td>
                                            <td>
                                                <a href="https://wa.me/${wa}" target="_blank" class="text-blue-600 hover:text-blue-800">${item.no_telp}</a>
                                            </td>
                                            <td>
                                                <div class="table-cell-content table-cell-expandable" title="${item.isi}">${item.isi}</div>
                                            </td>
                                            <td class="text-center">
                                                ${item.status === 'pending' ? '<span class="status-badge status-pending">Pending</span>' : 
                                                    item.status === 'selesai' ? '<span class="status-badge status-selesai">Selesai</span>' : '<span class="status-badge">Tidak diketahui</span>'}
                                            </td>
                                            <td class="visit-status ${visitClass} text-center">${visitText}</td>
                                            <td class="text-center">
                                                <button onclick="lihatDetail(${item.id}, '${item.nama_lengkap.replace(/'/g, "\\'")}', '${item.no_telp}', '${item.isi.replace(/'/g, "\\'")}', '${item.status}', '${item.created_at}')" 
                                                    class="text-blue-600 hover:text-blue-800 text-sm px-2 py-1 rounded hover:bg-blue-50">
                                                    Lihat
                                                </button>
                                            </td>
                                        </tr>
                                    `;
                                });

                                // Generate mobile cards
                                data.data.forEach((item, index) => {
                                    mobileCardsContainer.innerHTML += generateMobileCard(item, index,
                                        data.from);
                                });
                            }

                            // Pagination Info
                            showingStart.innerText = data.from || 0;
                            showingEnd.innerText = data.to || 0;
                            totalRows.innerText = data.total;

                            // Pagination Buttons - improved for mobile
                            pagination.innerHTML = "";

                            // Previous button
                            if (data.current_page > 1) {
                                pagination.innerHTML += `
                                    <button onclick="fetchData(${data.current_page - 1})" 
                                        class="px-2 lg:px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 text-sm">
                                        ‹
                                    </button>
                                `;
                            }

                            // Page numbers (limit on mobile)
                            let startPage = Math.max(1, data.current_page - 2);
                            let endPage = Math.min(data.last_page, data.current_page + 2);

                            for (let i = startPage; i <= endPage; i++) {
                                pagination.innerHTML += `
                                    <button onclick="fetchData(${i})" 
                                        class="px-2 lg:px-3 py-1 rounded text-sm ${i === data.current_page ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300'}">
                                        ${i}
                                    </button>
                                `;
                            }

                            // Next button
                            if (data.current_page < data.last_page) {
                                pagination.innerHTML += `
                                    <button onclick="fetchData(${data.current_page + 1})" 
                                        class="px-2 lg:px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 text-sm">
                                        ›
                                    </button>
                                `;
                            }

                            loadWidgetData();
                        })
                        .catch(err => {
                            console.error('Error fetching data:', err);
                            tableBody.innerHTML =
                                `<tr><td colspan="7" class="text-center py-4 text-red-600">Error loading data</td></tr>`;
                            mobileCardsContainer.innerHTML =
                                '<div class="text-center py-8 text-red-500">Error loading data</div>';
                        });
                }

                // Event Listeners
                searchInput.addEventListener("keyup", () => fetchData());
                statusFilter.addEventListener("change", () => fetchData());

                // Initial Load
                fetchData();
                loadWidgetData();
            });

            let currentId = null;

            function lihatDetail(id, nama, no_telp, isi, status, created_at) {
                currentId = id;
                let wa = no_telp.replace(/^0/, "62");

                let content = `
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Nama:</p>
                            <p class="text-sm text-gray-900">${nama}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">No. Telp:</p>
                            <p class="text-sm">
                                <a href="https://wa.me/${wa}" target="_blank" class="text-blue-600 hover:text-blue-800">${no_telp}</a>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Isi Laporan:</p>
                            <p class="text-sm text-gray-900 whitespace-pre-wrap">${isi}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dibuat:</p>
                            <p class="text-sm text-gray-900">${new Date(created_at).toLocaleString()}</p>
                        </div>
                    </div>
                `;

                document.getElementById("detailContent").innerHTML = content;
                document.getElementById("newStatus").value = status;
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
                            // Update both desktop table and mobile card
                            const visitCell = document.querySelector(`#row-${id} .visit-status`);
                            if (visitCell) {
                                visitCell.textContent = "Sudah Dibaca";
                                visitCell.className = "visit-status text-blue-600 font-bold";
                            }

                            const mobileCard = document.querySelector(`#card-${id} .visit-badge`);
                            if (mobileCard) {
                                mobileCard.textContent = "Sudah Dibaca";
                                mobileCard.className = "visit-badge visit-read";
                            }

                            loadWidgetData();
                        }
                    })
                    .catch(err => console.error('Error marking as read:', err));
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
                            if (typeof Toast !== 'undefined') {
                                Toast.success(data.message);
                            } else {
                                alert(data.message || 'Status berhasil diupdate');
                            }
                            closeModal("detailModal");
                            fetchData(); // refresh table + widget automatically
                        } else {
                            alert("Gagal update status");
                        }
                    })
                    .catch(err => {
                        console.error('Error updating status:', err);
                        alert("Terjadi kesalahan saat mengupdate status");
                    });
            }

            function openModal(id) {
                document.getElementById(id).classList.remove("hidden");
                document.body.style.overflow = 'hidden'; // Prevent body scroll
            }

            function closeModal(id) {
                document.getElementById(id).classList.add("hidden");
                document.body.style.overflow = 'auto'; // Restore body scroll
            }

            // Close modal when clicking outside
            document.getElementById('detailModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal('detailModal');
                }
            });

            // Handle escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal('detailModal');
                }
            });

            // Utility function for widget data loading
            function loadWidgetData() {
                fetch('/feedback/widget-data')
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('totalLaporan').textContent = data.total;
                        document.getElementById('belumDibacaCount').textContent = data.belumDibaca;
                        document.getElementById('sudahDibacaCount').textContent = data.sudahDibaca;
                        document.getElementById('sudahDiselesaikanCount').textContent = data.sudahDiselesaikan;
                    })
                    .catch(err => console.error('Error loading widget data:', err));
            }

            // Add loading states
            function showLoading() {
                const tableBody = document.getElementById('tableBody');
                const mobileContainer = document.getElementById('mobileCardsContainer');

                tableBody.innerHTML =
                    '<tr><td colspan="7" class="text-center py-8"><div class="animate-spin inline-block w-6 h-6 border-2 border-blue-600 border-t-transparent rounded-full"></div><br><span class="text-sm text-gray-500 mt-2">Memuat data...</span></td></tr>';
                mobileContainer.innerHTML =
                    '<div class="text-center py-8"><div class="animate-spin inline-block w-6 h-6 border-2 border-blue-600 border-t-transparent rounded-full"></div><br><span class="text-sm text-gray-500 mt-2">Memuat data...</span></div>';
            }

            // Enhanced fetchData with loading state
            const originalFetchData = window.fetchData;
            window.fetchData = function(page = 1) {
                showLoading();
                return originalFetchData(page);
            };
        </script>
    @endpush
@endsection