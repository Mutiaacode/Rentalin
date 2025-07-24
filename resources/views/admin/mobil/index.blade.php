@extends('layouts.app')

@section('app')
    <div class="min-h-screen bg-gray-50 py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Data Mobil</h1>
                    <p class="text-sm text-gray-600">Kelola data mobil rental</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Kelola Sewa
                    </a>
                    <a href="{{ route('mobil.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        + Tambah Mobil
                    </a>
                </div>
            </div>


            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                <input type="text" id="searchInput" placeholder="Cari nama mobil atau plat nomor..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <table class="min-w-full" id="mobilTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mobil</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plat Nomor</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga/Hari</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($mobils as $mobil)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $mobil->nama_mobil }}</p>
                                        <p class="text-xs text-gray-500">{{ $mobil->merk ?? 'No brand' }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $mobil->plat_nomor }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm font-medium text-gray-900">Rp {{ $mobil->harga }}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="text-sm text-gray-900">{{ $mobil->tahun }}</p>
                                </td>
                                <td class="px-4 py-3">
                                    @if ($mobil->gambar)
                                        <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->nama_mobil }}"
                                            class="h-12 w-16 object-cover rounded cursor-pointer hover:opacity-75"
                                            onclick="showImage('{{ asset('storage/' . $mobil->gambar) }}', '{{ $mobil->nama_mobil }}')">
                                    @else
                                        <div class="h-12 w-16 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('mobil.edit', $mobil) }}"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Edit
                                        </a>
                                        <button onclick="confirmDelete({{ $mobil->id }}, '{{ $mobil->nama_mobil }}')"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center">
                                    <div class="text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        <p class="text-sm font-medium">Tidak ada data mobil</p>
                                        <p class="text-xs">Belum ada mobil yang terdaftar</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if (method_exists($mobils, 'links'))
                <div class="mt-6">
                    {{ $mobils->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- modal foto -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50 p-4">
        <div class="relative max-w-2xl max-h-full">
            <button onclick="closeImageModal()" class="absolute top-2 right-2 text-white hover:text-gray-300 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <img id="modalImage" src="/placeholder.svg" alt="" class="max-w-full max-h-full object-contain rounded">
            <div class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-sm">
                <span id="modalTitle"></span>
            </div>
        </div>
    </div>

    <!-- modal hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
            <div class="text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Mobil</h3>
                <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus mobil <strong
                        id="carName"></strong>?</p>
                <div class="flex justify-center space-x-3">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 text-sm bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn"
                        class="px-4 py-2 text-sm bg-red-600 text-white rounded-md hover:bg-red-700">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>


    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const search = this.value.toLowerCase();
            const rows = document.querySelectorAll('#mobilTable tbody tr:not(:last-child)');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(search) ? '' : 'none';
            });
        });

        function showImage(src, title) {
            document.getElementById('modalImage').src = src;
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }

        let deleteId = null;

        function confirmDelete(id, name) {
            deleteId = id;
            document.getElementById('carName').textContent = name;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
            deleteId = null;
        }
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (deleteId) {
                const form = document.getElementById('deleteForm');
                form.action = `/mobil/${deleteId}`;
                form.submit();
            }
        });
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) closeImageModal();
        });
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
                closeDeleteModal();
            }
        });
    </script>
@endsection
