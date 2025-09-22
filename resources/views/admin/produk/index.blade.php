<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Produk') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Daftar Produk</h3>
                <a href="{{ route('admin.produk.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Produk
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
    @forelse ($produks as $produk)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <img src="{{ asset('storage/produk/' . $produk->foto) }}" alt="{{ $produk->name }}" class="w-16 h-16 object-cover rounded">
            </td>
            
            {{-- INI ADALAH BARIS YANG HARUS DIPASTIKAN BENAR --}}
            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $produk->nama }}</td>
            
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ optional($produk->kategori)->nama ?? 'Tanpa Kategori' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('admin.produk.edit', $produk) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form class="inline-block ml-4 delete-form" action="{{ route('admin.produk.destroy', $produk) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        {{-- ... --}}
    @endforelse
</tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $produks->links() }}
            </div>

        </div>
    </div>
</x-admin-layout>
