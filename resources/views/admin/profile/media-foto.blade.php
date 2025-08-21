@extends('admin.layouts.app')
@section('content')
    <div id="Content" class="relative flex flex-col flex-1 gap-6 p-6 pb-[30px] w-full shrink-0">

        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Data Foto Desa</h1>
                <p class="text-gray-600">Kelola semua foto desa</p>
            </div>


            <!-- Table -->
            <div class="table-container rounded-lg shadow">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                            @foreach ($media as $m)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $m->description ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="thumbnail-selection flex w-[100px] h-[100px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm  space-x-2">
                                        <button class="edit-button text-yellow-600 hover:text-yellow-800 font-medium"
                                            data-id="{{ $m->id }}" data-description="{{ $m->description }}"
                                            data-image="{{ Storage::url($m->file_path) }}"
                                            data-update-url="{{ route('profile.media.update', $m->id) }}">
                                            Edit
                                        </button>
                                        <button class="delete-button text-red-600 hover:text-red-800 font-medium"
                                            data-id="{{ $m->id }}"
                                            data-delete-url="{{ route('profile.media.destroy', $m->id) }}">
                                            Hapus
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-700">
                    Menampilkan <span id="showingStart">{{ $media->firstItem() }}</span> sampai <span
                        id="showingEnd">{{ $media->lastItem() }}</span> dari <span
                        id="totalRows">{{ $media->total() }}</span> data
                </div>
                <div class="flex space-x-2" id="pagination">
                    {{ $media->links() }}
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-lg shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-medium text-gray-900">Edit Media</h3>
                <button id="closeModalBtn" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.693a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                        <img id="currentImage" src="" alt="Current Image"
                            class="w-32 h-32 object-cover rounded-lg border">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="description" name="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                    </div>

                    <div>
                        <label for="file_path" class="block text-sm font-medium text-gray-700">Ganti Gambar
                            (Opsional)</label>
                        <input type="file" name="file_path" id="file_path"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-4">
                    <button id="cancelModalBtn" type="button"
                        class="text-sm font-semibold leading-6 text-gray-900">Batal</button>
                    <button type="submit"
                        class="rounded-md bg-desa-green px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="Modal-Delete" class="modal fixed inset-0 h-screen z-40 flex bg-[#080C1ACC] hidden">
        <div id="Alert" class="flex flex-col w-[335px] shrink-0 rounded-2xl overflow-hidden bg-white m-auto">
            <div class="flex items-center justify-between p-4 gap-3 bg-desa-black">
                <p class="font-medium leading-5 text-white">Hapus Pembangunan Desa?</p>
                <button class="btn-close-modal">
                    <img src="{{ asset('/assets') }}/images/icons/close-circle-white.svg" class="flex size-6 shrink-0"
                        alt="icon">
                </button>
            </div>
            <div class="flex flex-col p-4 gap-3">
                <p class="font-medium text-sm leading-[22.5px] text-desa-secondary">Tindakan ini permanen dan tidak bisa
                    dibatalkan!</p>
                <hr class="border-desa-background">
                <div class="flex items-center gap-3">
                    <button
                        class="btn-close-modal flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] border border-desa-background hover:bg-desa-black hover:text-white transition-setup">
                        <span class="font-semibold text-sm">Batal</span>
                    </button>
                    <form action="" id="eventDelete" method="POST" class="form-hapus">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center h-14 rounded-2xl py-3 px-8 gap-[10px] bg-desa-red w-full">
                            <img src="{{ asset('/assets') }}/images/icons/trash-white.svg" class="flex size-6 shrink-0"
                                alt="">
                            <span class="font-semibold text-sm text-white">Iya Hapus</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editModal = document.getElementById('editModal');
                const editForm = document.getElementById('editForm');
                const descriptionTextarea = document.getElementById('description');
                const currentImage = document.getElementById('currentImage');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const cancelModalBtn = document.getElementById('cancelModalBtn');

                function showModal(id, description, imageUrl, updateUrl) {
                    editForm.action = updateUrl;
                    descriptionTextarea.value = description ?? '';
                    currentImage.src = imageUrl;
                    editModal.classList.remove('hidden');
                }

                function hideModal() {
                    editModal.classList.add('hidden');
                }

                document.querySelectorAll('.edit-button').forEach(btn => {
                    btn.addEventListener('click', () => {
                        showModal(btn.dataset.id, btn.dataset.description, btn.dataset.image, btn
                            .dataset.updateUrl);
                    });
                });

                closeModalBtn.addEventListener('click', hideModal);
                cancelModalBtn.addEventListener('click', hideModal);

                window.addEventListener('click', (e) => {
                    if (e.target === editModal) hideModal();
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalDelete = document.getElementById('Modal-Delete');
                const formDelete = document.getElementById('eventDelete');
                const closeModalBtns = document.querySelectorAll('.btn-close-modal');

                function showDeleteModal(deleteUrl) {
                    formDelete.action = deleteUrl;
                    modalDelete.classList.remove('hidden');
                }

                function hideDeleteModal() {
                    modalDelete.classList.add('hidden');
                }

                document.querySelectorAll('.delete-button').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const deleteUrl = btn.dataset.deleteUrl;
                        showDeleteModal(deleteUrl);
                    });
                });

                closeModalBtns.forEach(btn => {
                    btn.addEventListener('click', hideDeleteModal);
                });

                window.addEventListener('click', e => {
                    if (e.target === modalDelete) hideDeleteModal();
                });
            });
        </script>
    @endpush
@endsection
