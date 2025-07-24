@extends('layouts.app')

@section('app')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Form Sewa Mobil</h1>

        @auth
            <form action="{{ route('rental.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">

                <div>
                    <label class="block font-medium">Nama Mobil</label>
                    <input type="text" value="{{ $mobil->nama_mobil }}" disabled
                        class="w-full border rounded p-2 bg-gray-100">
                </div>

                <div>
                    <label class="block font-medium">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-medium">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-medium">Foto KTP</label>
                    <input type="file" name="foto_ktp" accept="image/*" class="w-full" required>
                </div>

                <div>
                    <label class="block font-medium">Foto SIM</label>
                    <input type="file" name="foto_sim" accept="image/*" class="w-full" required>
                </div>

                <div>
                    <label class="block font-medium">No HP</label>
                    <input type="text" name="no_hp" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-medium">Sosial Media</label>
                    <input type="text" name="sosial_media" class="w-full border rounded p-2" required>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Sewa Sekarang</button>
            </form>
        @else
            <p class="text-red-500">Silakan login terlebih dahulu untuk menyewa mobil.</p>
        @endauth
    </div>
@endsection

