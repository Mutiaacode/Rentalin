@extends('layouts.app')

@section('app')
    <div class="min-h-screen bg-gray-50 py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Detail Sewa #{{ $data->id }}</h1>
                        <p class="text-sm text-gray-600">{{ $data->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <!-- Status Badge -->
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'diterima' => 'bg-green-100 text-green-800',
                        'ditolak' => 'bg-red-100 text-red-800',
                        'selesai' => 'bg-blue-100 text-blue-800',
                    ];
                    $color = $statusColors[$data->status] ?? 'bg-gray-100 text-gray-800';
                @endphp
                <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full {{ $color }}">
                    {{ ucfirst($data->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Info Sewa -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Sewa</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-500">Penyewa</label>
                                    <div class="flex items-center mt-1">
                                        <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-sm font-medium text-blue-600">
                                                {{ substr($data->user->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium">{{ $data->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $data->user->email ?? 'No email' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-500">Mobil</label>
                                    <p class="text-sm font-medium mt-1">{{ $data->mobil->nama_mobil }}</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-500">No. HP</label>
                                    <p class="text-sm mt-1">
                                        <a href="tel:{{ $data->no_hp }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $data->no_hp }}
                                        </a>
                                    </p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-500">Sosial Media</label>
                                    <p class="text-sm mt-1">{{ $data->sosial_media }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Periode Sewa -->
                        <div class="mt-6 pt-6 border-t">
                            <label class="text-sm text-gray-500">Periode Sewa</label>
                            <div class="flex items-center space-x-4 mt-2">
                                <div class="bg-blue-50 px-3 py-2 rounded">
                                    <span class="text-sm font-medium text-blue-900">
                                        {{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}
                                    </span>
                                </div>
                                <span class="text-gray-400">→</span>
                                <div class="bg-green-50 px-3 py-2 rounded">
                                    <span class="text-sm font-medium text-green-900">
                                        {{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">
                                Durasi:
                                {{ \Carbon\Carbon::parse($data->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($data->tanggal_selesai)) + 1 }}
                                hari
                            </p>
                        </div>
                    </div>

                    <!-- Dokumen -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Dokumen</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- KTP -->
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 block">Foto KTP</label>
                                <img src="{{ asset('storage/' . $data->foto_ktp) }}" alt="KTP"
                                    class="w-full h-40 object-cover rounded border cursor-pointer hover:opacity-90"
                                    onclick="showImage('{{ asset('storage/' . $data->foto_ktp) }}', 'Foto KTP')">
                                <p class="text-xs text-blue-600 mt-1 cursor-pointer"
                                    onclick="showImage('{{ asset('storage/' . $data->foto_ktp) }}', 'Foto KTP')">
                                    Klik untuk memperbesar
                                </p>
                            </div>

                            <!-- SIM -->
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 block">Foto SIM</label>
                                <img src="{{ asset('storage/' . $data->foto_sim) }}" alt="SIM"
                                    class="w-full h-40 object-cover rounded border cursor-pointer hover:opacity-90"
                                    onclick="showImage('{{ asset('storage/' . $data->foto_sim) }}', 'Foto SIM')">
                                <p class="text-xs text-blue-600 mt-1 cursor-pointer"
                                    onclick="showImage('{{ asset('storage/' . $data->foto_sim) }}', 'Foto SIM')">
                                    Klik untuk memperbesar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Update Status -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ubah Status</h3>

                        <form action="{{ route('admin.sewa.status', $data->id) }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <select name="status"
                                    class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                                    <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="diterima" {{ $data->status == 'diterima' ? 'selected' : '' }}>Diterima
                                    </option>
                                    <option value="ditolak" {{ $data->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                    <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>

                                <button type="submit"
                                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>

                        <div class="space-y-3">
                            <a href="tel:{{ $data->no_hp }}"
                                class="w-full bg-green-100 text-green-700 py-2 px-4 rounded-md text-center block hover:bg-green-200">
                                📞 Hubungi
                            </a>

                            <button onclick="window.print()"
                                class="w-full bg-gray-100 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-200">
                                🖨️ Cetak
                            </button>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Timeline</h3>

                        <div class="space-y-3">
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3"></div>
                                <div>
                                    <p class="text-sm font-medium">Sewa Dibuat</p>
                                    <p class="text-xs text-gray-500">{{ $data->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            @if ($data->updated_at != $data->created_at)
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-600 rounded-full mt-2 mr-3"></div>
                                    <div>
                                        <p class="text-sm font-medium">Terakhir Update</p>
                                        <p class="text-xs text-gray-500">{{ $data->updated_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50 p-4">
        <div class="relative max-w-3xl max-h-full">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
            <img id="modalImage" src="/placeholder.svg" alt=""
                class="max-w-full max-h-full object-contain rounded">
            <div class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-sm">
                <span id="modalTitle"></span>
            </div>
        </div>
    </div>

    <script>
        function showImage(src, title) {
            document.getElementById('modalImage').src = src;
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Close with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>
@endsection
