<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Kategori: {{ $kategori->nama }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            {{-- Kita bisa menggunakan kembali komponen kartu produk jika mau, atau copy paste --}}
            @forelse ($produks as $produk)
                <div class="bg-white border rounded-lg shadow-sm overflow-hidden group transition-transform duration-300 hover:-translate-y-2">
                     {{-- ... isi kartu produk sama seperti di home.blade.php ... --}}
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada produk di kategori ini.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $produks->links() }}
        </div>
    </div>
</x-app-layout>