<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pesanan #{{ $pesanan->id }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Ringkasan Pesanan</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Order ID</p>
                        <p class="font-semibold">#{{ $pesanan->id }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Pesan</p>
                        <p class="font-semibold">{{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Pelanggan</p>
                        <p class="font-semibold">{{ $pesanan->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status</p>
                        <p class="font-semibold capitalize px-2 inline-flex text-xs leading-5 rounded-full bg-blue-100 text-blue-800">{{ $pesanan->status }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Item Produk</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga Satuan</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pesanan->details as $item)
                                <tr>
                                    <td class="px-6 py-4 flex items-center space-x-4">
                                        <img src="{{ asset('storage/produk/' . $item->produk->foto) }}" class="w-10 h-10 object-cover rounded">
                                        <span>{{ $item->produk->name }}</span>
                                    </td>
                                    <td class="px-6 py-4">{{ $item->jumlah }}</td>
                                    <td class="px-6 py-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-right">Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right font-bold">Total Keseluruhan</td>
                                <td class="px-6 py-3 text-right font-bold">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Update Status Pesanan</h3>
        <form action="{{ route('admin.pesanan.update', $pesanan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex items-center space-x-4">
                <select name="status" class="block w-full md:w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $pesanan->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $pesanan->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="completed" {{ $pesanan->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $pesanan->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <x-primary-button>Update Status</x-primary-button>
            </div>
        </form>
    </div>
</div>
    </div>
</x-admin-layout>