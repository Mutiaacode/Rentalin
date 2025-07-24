<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Rentalin
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <!-- Tambahkan link font Outfit dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Outfit', sans-serif;

        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-[#475569]">
   <header class="w-full bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <div class="flex items-center space-x-8">
                <a class="text-[#2563EB] font-semibold text-xl select-none" href="{{ route('dashboard') }}">
                    RENTALIN
                </a>
            </div>

            {{-- Bagian Kanan Navbar --}}
            <div class="flex items-center space-x-6">
                @php
                    $status = auth()->user()?->sewa_terbaru?->status;
                @endphp

                {{-- Notifikasi Sewa --}}
                @if ($status === 'ditolak' || $status === 'diterima')
                    <div class="relative group">
                        <button aria-label="notifications"
                            class="relative text-[#475569] hover:text-[#2563EB] focus:outline-none">
                            <i class="far fa-bell text-lg"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-[#EF4444] text-white rounded-full text-[10px] font-semibold w-4 h-4 flex items-center justify-center">
                                1
                            </span>
                        </button>

                        {{-- Tooltip notifikasi --}}
                        <div
                            class="absolute right-0 mt-2 w-64 bg-white border rounded-lg shadow-lg p-3 z-50 hidden group-hover:block">
                            <p class="text-sm text-gray-700">
                                Status sewa Anda 
                                <span class="font-semibold text-{{ $status === 'diterima' ? 'green' : 'red' }}-600">
                                    {{ $status }}
                                </span>.
                                @if ($status === 'diterima')
                                    <br>Silakan datang ke tempat untuk melakukan pembayaran cash.
                                @endif
                            </p>
                        </div>
                    </div>
                @endif

                
                @auth
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-800 text-sm font-medium">
                            Hi, {{ Auth::user()->nama }} 👋 
                        </span>

                        <form action="{{ url('/logout') }}" method="GET">
                            <button type="submit"
                                class="bg-red-500 text-white text-sm font-semibold px-4 py-1 rounded">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="/login">
                        <button class="bg-[#2563EB] text-white text-xs font-semibold px-4 py-1 rounded">
                            Login
                        </button>
                    </a>
                @endauth
            </div>
        </nav>
    </div>
</header>



    @yield('app')

    <footer class="bg-white border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 md:grid-cols-4 gap-8 text-[#475569] text-xs">
        <div>
            <h4 class="text-[#2563EB] font-bold mb-2 select-none">
                Rentalin
            </h4>
            <p class="leading-tight max-w-[200px]">
                Visi kami adalah memberikan kemudahan dan kenyamanan dalam menyewa mobil untuk kebutuhan harian Anda.
            </p>
            <p class="mt-2 text-[11px] text-[#64748B]">
                Alamat: Metro, JL Rambutan Iring Mulyo 15a
            </p>
        </div>
        <div>
        </div>
        <div>
            <h5 class="font-semibold mb-2 select-none">
                Tentang Kami
            </h5>
            <ul class="space-y-1">
                <li>
                    <a class="hover:underline" href="#">
                        Cara Kerja
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Fitur Unggulan
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Kerja Sama
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Hubungan Bisnis
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <h5 class="font-semibold mb-2 select-none">
                Sosial Media
            </h5>
            <ul class="space-y-1">
                <li>
                    <a class="hover:underline" href="#">
                        Discord
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Instagram
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Twitter
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="#">
                        Facebook
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row justify-between items-center text-[10px] text-[#475569]">
        <p class="select-none">
            ©2025 Rentalin. Seluruh hak cipta dilindungi.
        </p>
        <div class="flex space-x-4 mt-2 sm:mt-0">
            <a class="hover:underline" href="#">
                Privacy &amp; Policy
            </a>
            <a class="hover:underline" href="#">
                Terms &amp; Condition
            </a>
        </div>
    </div>
</footer>

