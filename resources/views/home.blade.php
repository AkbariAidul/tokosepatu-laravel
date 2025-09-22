<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Produk Kami</h3>

                    {{-- Grid untuk menampilkan produk --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                        {{-- Mulai perulangan data produk --}}
                        @forelse ($produks as $produk)
                            <div class="border rounded-lg overflow-hidden shadow-lg">
                                {{-- Gambar Produk --}}
                                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="w-full h-48 object-cover">

                                <div class="p-4">
                                    {{-- Nama Produk --}}
                                    <h4 class="font-bold text-lg truncate">{{ $produk->nama }}</h4>

                                    {{-- Harga Produk --}}
                                    <p class="text-gray-600 mt-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('produk.show', $produk) }}" class="mt-4 inline-block bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 transition duration-300">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @empty
                            {{-- Pesan jika tidak ada produk --}}
                            <p class="col-span-4 text-center text-gray-500">Belum ada produk yang tersedia.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>