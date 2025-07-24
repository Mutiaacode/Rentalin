@extends('layouts.app')

@section('app')
    <main class="max-w-[1440px] mx-auto px-6 py-8 flex flex-col lg:flex-row gap-6">
        <form action="{{ route('rental.store') }}" method="POST" enctype="multipart/form-data"
            class="flex-1 flex flex-col gap-6 max-w-[900px]">
            @csrf
            <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">

            <!-- Informasi Penagihan -->
            <section class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="font-semibold text-sm text-[#1E293B]">Informasi Penagihan</h2>
                    <span class="text-xs text-[#94A3B8]">Langkah 1 dari 4</span>
                </div>
                <p class="text-xs text-[#94A3B8] mb-4">Masukkan informasi kontak kamu.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-[#475569] mb-1 block">Nomor Telepon</label>
                        <input type="text" name="no_hp" class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2"
                            placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-[#475569] mb-1 block">Sosial Media</label>
                        <input type="text" name="sosial_media" class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2"
                            placeholder="@instagram" required>
                    </div>
                </div>
            </section>

            <!-- Informasi Penyewaan -->
            <section class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="font-semibold text-sm text-[#1E293B]">Informasi Penyewaan</h2>
                    <span class="text-xs text-[#94A3B8]">Langkah 2 dari 4</span>
                </div>
                <p class="text-xs text-[#94A3B8] mb-4">Pilih tanggal mulai dan selesai sewa.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-[#475569] mb-1">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggalMulai"
                            class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-[#475569] mb-1">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggalSelesai"
                            class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2" required>
                    </div>
                </div>
            </section>

            <!-- Upload Dokumen -->
            <section class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="font-semibold text-sm text-[#1E293B]">Upload Dokumen</h2>
                    <span class="text-xs text-[#94A3B8]">Langkah 3 dari 4</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-[#475569] mb-1 block">Foto KTP</label>
                        <input type="file" name="foto_ktp" accept="image/*"
                            class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2" required>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-[#475569] mb-1 block">Foto SIM</label>
                        <input type="file" name="foto_sim" accept="image/*"
                            class="w-full text-xs bg-[#F1F5F9] rounded-md px-3 py-2" required>
                    </div>
                </div>
            </section>

            <!-- Konfirmasi -->
            <section class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="font-semibold text-sm text-[#1E293B]">Konfirmasi</h2>
                    <span class="text-xs text-[#94A3B8]">Langkah 5 dari 5</span>
                </div>
                <p class="text-xs text-[#94A3B8] mb-4">Kamu siap menyewa mobil. Klik tombol di bawah untuk mengajukan.</p>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-[#2563EB] text-white text-xs font-semibold rounded-md px-5 py-2 hover:bg-[#1E40AF]">
                        Rental Sekarang
                    </button>
                    <a href="/"
                        class="bg-[#CBD5E1] text-[#1E293B] text-xs font-semibold rounded-md px-5 py-2 hover:bg-[#E2E8F0]">
                        Kembali
                    </a>
                </div>
            </section>
        </form>

        <!-- Sidebar Ringkasan -->
        <aside class="w-full max-w-[360px] flex-shrink-0 bg-white rounded-lg p-6 shadow-sm">
            <h3 class="font-semibold text-sm text-[#1E293B] mb-1">Ringkasan Sewa</h3>
            <p class="text-xs text-[#94A3B8] mb-4">
                Harga dapat berubah tergantung pada durasi sewa dan harga mobil yang Anda pilih.
            </p>

            <div class="flex items-center space-x-4 mb-4">
                <div class="w-100 h-50  overflow-hidden flex items-center justify-center">
                    <img alt="Foto mobil" class="object-contain w-full h-full"
                        src="{{ asset('storage/' . $mobil->gambar) }}" />
                </div>
                <div>
                    <h4 class="font-semibold text-base text-[#1E293B]">
                        {{ $mobil->nama_mobil }}
                    </h4>
                    <div class="flex items-center space-x-1 text-[#FBBF24] text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-xs text-[#475569] ml-2">527+ Ulasan</span>
                    </div>
                </div>
            </div>

            <div class="flex space-x-2 mb-4">
                <input
                    class="flex-1 text-xs text-[#475569] bg-[#F1F5F9] rounded-l-md px-3 py-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#2563EB]"
                    placeholder="Masukkan kupon" type="text" />
                <button
                    class="bg-[#2563EB] text-white text-xs font-semibold rounded-r-md px-4 py-2 hover:bg-[#1E40AF] transition-colors"
                    type="button">
                    Gunakan Sekarang
                </button>
            </div>

            <div class="border-t border-gray-200 pt-3">
                <div class="flex justify-between items-center mb-1">
                    <span class="font-semibold text-sm text-[#1E293B]">Harga Sewa</span>
                    <span class="font-extrabold text-lg text-[#1E293B]">
                        Rp<span id="hargaPerHari">{{ $mobil->harga }}</span><span class="font-normal"> /hari</span>
                    </span>
                </div>
                <p class="text-xs text-[#94A3B8] mb-2">
                    Harga sudah termasuk diskon sewa dan tidak dikenakan pajak tambahan.
                </p>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-semibold text-[#1E293B]">Total Harga</span>
                    <span class="text-lg font-bold text-[#1E293B]">Rp<span id="totalHarga">0</span></span>
                </div>
            </div>
        </aside>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hargaPerHari = parseInt(document.getElementById("hargaPerHari").innerText);
            const inputMulai = document.getElementById("tanggalMulai");
            const inputSelesai = document.getElementById("tanggalSelesai");
            const totalHarga = document.getElementById("totalHarga");

            function updateTotalHarga() {
                const mulai = new Date(inputMulai.value);
                const selesai = new Date(inputSelesai.value);

                if (!isNaN(mulai) && !isNaN(selesai) && selesai >= mulai) {
                    const diffTime = selesai.getTime() - mulai.getTime();
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 biar termasuk hari mulai
                    const total = hargaPerHari * diffDays;
                    totalHarga.innerText = total.toLocaleString('id-ID');
                } else {
                    totalHarga.innerText = '0';
                }
            }

            inputMulai.addEventListener("change", updateTotalHarga);
            inputSelesai.addEventListener("change", updateTotalHarga);
        });
    </script>
@endsection
