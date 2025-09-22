<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>!
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm hover:bg-gray-50 transition flex items-center space-x-4">
                <div class="text-3xl p-3 bg-blue-100 text-blue-600 rounded-lg">
                    📦 </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Total Produk</h3>
                    <p class="text-3xl font-bold mt-1">{{ $totalProduk }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm hover:bg-gray-50 transition flex items-center space-x-4">
                <div class="text-3xl p-3 bg-green-100 text-green-600 rounded-lg">
                    🏷️ </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Total Kategori</h3>
                    <p class="text-3xl font-bold mt-1">{{ $totalKategori }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm hover:bg-gray-50 transition flex items-center space-x-4">
                <div class="text-3xl p-3 bg-purple-100 text-purple-600 rounded-lg">
                    👥 </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Total Pengguna</h3>
                    <p class="text-3xl font-bold mt-1">{{ $totalUser }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.produk.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
                        + Tambah Produk Baru
                    </a>
                    <a href="{{ route('admin.kategori.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition">
                        + Tambah Kategori Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>