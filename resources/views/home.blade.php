<x-app-layout>
    {{-- 1. HERO SECTION DENGAN BACKGROUND IMAGE --}}
    <div class="relative h-[500px] flex items-center justify-center text-center text-white rounded-lg overflow-hidden shadow-lg mb-12">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2070&auto=format&fit=crop" 
                 alt="Sepatu Lari" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative z-10 p-4">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-md">Gaya Baru, Langkah Baru</h1>
            <p class="text-lg md:text-xl mb-6 drop-shadow-sm">Temukan sepatu yang sempurna untuk setiap momen.</p>
            <a href="#produk-terbaru" class="bg-white text-gray-900 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition text-lg">
                Jelajahi Koleksi
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- 2. BAGIAN KATEGORI UNGGULAN --}}
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8">Jelajahi Kategori</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($kategoris->take(4) as $kategori)
                    <a href="{{ route('kategori.show', $kategori) }}" class="relative rounded-lg overflow-hidden group">
                        <img src="https://source.unsplash.com/400x400/?shoes,{{ $kategori->nama }}" alt="{{ $kategori->nama }}" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center group-hover:bg-opacity-60 transition">
                            <h3 class="text-white text-2xl font-bold">{{ $kategori->nama }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- 3. BAGIAN PRODUK TERBARU DENGAN KARTU YANG DISEMPURNAKAN --}}
        <div id="produk-terbaru">
            <h2 class="text-3xl font-bold text-center mb-8">Produk Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($produks as $produk)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden group transition-transform duration-300 hover:-translate-y-2">
                        <a href="{{ route('produk.show', $produk) }}" class="block">
                            <div class="relative">
                                <img src="{{ asset('storage/produk/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-white text-gray-900 text-xs font-bold px-2 py-1 rounded">
                                    {{ $produk->kategori->nama }}
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg truncate text-gray-800">{{ $produk->nama }}</h3>
                                <p class="text-gray-900 mt-2 text-xl font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Belum ada produk yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>