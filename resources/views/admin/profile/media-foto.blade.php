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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{$m->description ?? '-'}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                         <div
                                            class="thumbnail-selection flex w-[100px] h-[100px] shrink-0 rounded-3xl bg-desa-background overflow-hidden">
                                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                                class="w-full h-full object-cover" alt="thumbnail">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="https://wa.me/${item.whatsapp}" target="_blank"
                                            class="text-sm text-blue-600 hover:text-blue-800">
                                            ${item.whatsapp}
                                        </a>
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
                    Menampilkan <span id="showingStart">{{ $media->firstItem() }}</span> sampai <span id="showingEnd">{{ $media->lastItem() }}</span> dari <span
                        id="totalRows">{{ $media->total() }}</span> data
                </div>
                <div class="flex space-x-2" id="pagination">
                   {{ $media->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection