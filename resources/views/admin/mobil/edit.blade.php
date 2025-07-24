@extends('layouts.app')

@section('app')
    <div class="min-h-screen bg-gray-50 py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('mobil.index') }}" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Edit Mobil</h1>
                        <p class="text-sm text-gray-600">Update data mobil {{ $mobil->nama_mobil }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <form action="{{ route('mobil.update', $mobil) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Nama Mobil -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Mobil <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_mobil" value="{{ old('nama_mobil', $mobil->nama_mobil) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_mobil') border-red-500 @enderror"
                                placeholder="Contoh: Toyota Avanza" >
                            @error('nama_mobil')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Merk -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe
                            </label>
                            <input type="text" name="merk" value="{{ old('tipe', $mobil->tipe) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('merk') border-red-500 @enderror"
                                placeholder="Contoh: SUV">
                            @error('merk')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kapasitas BBM
                            </label>
                            <input type="text" name="merk" value="{{ old('kapasitas_bbm', $mobil->kapasitas_bbm) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kapasitas_bbm') border-red-500 @enderror"
                                placeholder="Contoh: 30">
                            @error('kapasitas_bbm')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Transmisi
                            </label>
                            <input type="text" name="merk" value="{{ old('tipe', $mobil->transmisi) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('transmisi') border-red-500 @enderror"
                                placeholder="Contoh: Matic">
                            @error('transmisi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jumlah Penumpang
                            </label>
                            <input type="text" name="merk" value="{{ old('jumlah_penumpang', $mobil->jumlah_penumpang) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jumlah_penumpang') border-red-500 @enderror"
                                placeholder="Contoh: 7">
                            @error('jumlah_penumpang')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Plat Nomor -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Plat Nomor <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="plat_nomor" value="{{ old('plat_nomor', $mobil->plat_nomor) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('plat_nomor') border-red-500 @enderror"
                                placeholder="Contoh: B 1234 ABC" >
                            @error('plat_nomor')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Row untuk Harga dan Tahun -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Harga -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Harga per Hari <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-500 text-sm">Rp</span>
                                    <input type="number" name="harga" value="{{ old('harga', $mobil->harga) }}"
                                        class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('harga') border-red-500 @enderror"
                                        placeholder="300000" >
                                </div>
                                @error('harga')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tahun -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Tahun Keluar <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="tahun" value="{{ old('tahun', $mobil->tahun) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tahun') border-red-500 @enderror"
                                    placeholder="2020" min="1990" max="{{ date('Y') + 1 }}">
                                @error('tahun')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        

                        <!-- Gambar -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Mobil
                            </label>

                            <!-- Current Image -->
                            @if ($mobil->gambar)
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->nama_mobil }}"
                                        class="h-32 w-48 object-cover rounded border">
                                </div>
                            @endif

                            <!-- Upload New Image -->
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="hidden @error('gambar') border-red-500 @enderror" onchange="previewImage(this)">
                                <div id="uploadArea" onclick="document.getElementById('gambar').click()"
                                    class="cursor-pointer">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-sm text-gray-600 mb-2">Klik untuk upload gambar baru</p>
                                    <p class="text-xs text-gray-500">PNG, JPG hingga 2MB (opsional)</p>
                                </div>
                                <div id="imagePreview" class="hidden">
                                    <img id="preview" src="/placeholder.svg" alt="Preview"
                                        class="max-w-full h-48 object-cover rounded mx-auto">
                                    <p class="text-sm text-gray-600 mt-2">Klik untuk ganti gambar</p>
                                </div>
                            </div>
                            @error('gambar')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->

                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('mobil.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 transition-colors">
                            Update Mobil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('uploadArea').classList.add('hidden');
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }


        document.getElementById('imagePreview').addEventListener('click', function() {
            document.getElementById('gambar').click();
        });


        document.querySelector('input[name="harga"]').addEventListener('input', function() {
            let value = this.value.replace(/[^\d]/g, '');
            this.value = value;
        });
    </script>
@endsection
