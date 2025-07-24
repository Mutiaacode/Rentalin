<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Rentalin
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-[#475569]">
    <header class="w-full bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a class="text-[#2563EB] font-semibold text-lg select-none" href="./">
                        RENTALIN
                    </a>
                    <div class="relative">
                        <input
                            class="pl-10 pr-10 py-2 rounded-lg border border-gray-300 text-sm text-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#2563EB] focus:border-transparent w-48 sm:w-64"
                            placeholder="Cari Mobil" type="text" />
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-[#94A3B8] text-sm">
                        </i>
                        <button aria-label="filter"
                            class="absolute right-2 top-1/2 -translate-y-1/2 text-[#94A3B8] hover:text-[#2563EB] focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke="#94A3B8" stroke-width="2" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"
                                    stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="favorites" class="text-[#475569] hover:text-[#2563EB] focus:outline-none">
                        <i class="far fa-heart text-lg">
                        </i>
                    </button>
                    <button aria-label="notifications"
                        class="relative text-[#475569] hover:text-[#2563EB] focus:outline-none">
                        <i class="far fa-bell text-lg">
                        </i>
                        <span
                            class="absolute -top-1 -right-1 bg-[#EF4444] text-white rounded-full text-[10px] font-semibold w-4 h-4 flex items-center justify-center">
                            1
                        </span>
                    </button>
                    <button aria-label="settings" class="text-[#475569] hover:text-[#2563EB] focus:outline-none">
                        <i class="fas fa-cog text-lg">
                        </i>
                    </button>
                    <a href="/login"><button
                            class="bg-[#2563EB] text-white text-xs font-semibold px-4 py-1 rounded">login</button></a>
                </div>
            </nav>
        </div>
    </header>

    <main class="main">

        @yield('hero')


    </main>
    <footer class="bg-white border-t border-gray-200">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 md:grid-cols-4 gap-8 text-[#475569] text-xs">
            <div>
                <h4 class="text-[#2563EB] font-bold mb-2 select-none">
                    Rentalin
                </h4>
                <p class="leading-tight max-w-[200px]">
                    Visi kami adalah memberikan kemudahan dan kenyamanan dalam menyewa mobil untuk kebutuhan harian
                    Anda.
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
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row justify-between items-center text-[10px] text-[#475569]">
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
</body>

</html>
