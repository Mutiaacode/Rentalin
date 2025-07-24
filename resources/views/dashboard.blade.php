@extends('layouts.app')

@section('app')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <!-- Banner -->
        <section class="relative rounded-xl overflow-hidden">
            <!-- Gambar background -->
            <img alt="banner" class="w-full object-cover max-h-[300px]" src="/banner.jpg" />

           
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

          
            <div class="absolute top-6 left-6 max-w-md text-white z-10">
                <h2 class="text-2xl font-semibold leading-tight">
                    Solusi <span class="font-normal">Terbaik</span><br />
                    untuk Sewa <span class="font-normal">Mobil</span>
                </h2>
                <p class="mt-2 text-sm leading-snug">
                    Nyaman, aman, dan terpercaya.<br />
                    Temukan mobil terbaik untuk segala kebutuhan – dengan harga transparan.
                </p>
                <a href="#list-mobil">
                    <button class="mt-4 bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-[#1D4ED8]">
                        Sewa Mobil Sekarang
                    </button>
                </a>
            </div>
        </section>


        <!-- List Mobil -->
        <section id="list-mobil" class="mt-8">
            <div class="flex justify-between items-center mb-2 px-1">
                <p class="text-xs text-[#94A3B8] select-none">List Mobil</p>
                <a class="text-xs text-[#2563EB] font-semibold hover:underline" href="#">View All</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($mobil as $m)
                    <article class="bg-white rounded-lg p-4 shadow-sm flex flex-col select-none">
                        <div class="flex justify-between items-start mb-1">
                            <div>
                                <h3 class="text-sm font-semibold text-[#1E293B]">{{ $m->nama_mobil }}</h3>
                                <p class="text-[9px] text-[#94A3B8] mt-0.5">{{ $m->tipe }}</p>
                            </div>
                            <i class="fas fa-heart text-sm text-[#EF4444]"></i>
                        </div>

                        <img class="w-full h-40 object-contain mb-3" src="{{ asset('storage/' . $m->gambar) }}"
                            alt="{{ $m->nama_mobil }}" />

                        <div class="flex justify-between text-[9px] text-[#94A3B8] mb-2">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-gas-pump"></i><span>{{ $m->kapasitas_bbm }}L</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-cog"></i><span>{{ $m->transmisi }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-users"></i><span>{{ $m->jumlah_penumpang }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <p class="text-xs font-semibold text-[#1E293B]">
                                Rp{{ number_format($m->harga, 0, ',', '.') }} <span class="font-normal">/hari</span>
                            </p>

                            @if ($m->sewaAktif->count() > 0)
                                <button
                                    class="bg-gray-400 text-white text-xs font-semibold px-4 py-1 rounded cursor-not-allowed"
                                    disabled>
                                    Sedang Disewa
                                </button>
                            @else
                                <a href="{{ url('rental/' . $m->id) }}">
                                    <button class="bg-[#2563EB] text-white text-xs font-semibold px-4 py-1 rounded">
                                        Rental
                                    </button>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <div class="flex justify-center items-center mt-8 mb-12 space-x-4">
            <a href="https://wa.me/6289636535790"><button class="bg-[#2563EB] text-white text-xs font-semibold px-4 py-2 rounded hover:bg-[#1D4ED8]">Hubungi Kami
                </button></a>
            <span class="text-xs text-[#94A3B8] select-none"></span>
        </div>
    </main>
@endsection
