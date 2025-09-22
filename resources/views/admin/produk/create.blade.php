<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{-- Menampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <x-input-label for="nama" :value="__('Nama Produk')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('name')" required autofocus />
                </div>

                <div class="mb-4">
                    <x-input-label for="kategori_id" :value="__('Kategori')" />
                    <select name="kategori_id" id="kategori_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <x-input-label for="harga" :value="__('Harga')" />
                    <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga')" required />
                </div>
                
                <div class="mb-4">
                    <x-input-label for="ketersediaan_stok" :value="__('Ketersediaan Stok')" />
                    <x-text-input id="ketersediaan_stok" class="block mt-1 w-full" type="text" name="ketersediaan_stok" value="Tersedia" required />
                </div>

                <div class="mb-4">
                    <x-input-label for="detail" :value="__('Detail Produk')" />
                    <textarea name="detail" id="detail" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('detail') }}</textarea>
                </div>

                <div class="mb-4">
                    <x-input-label for="foto" :value="__('Foto Produk')" />
                    <input type="file" name="foto" id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>
                    <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF (MAX. 2MB).</p>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button>
                        {{ __('Simpan Produk') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>