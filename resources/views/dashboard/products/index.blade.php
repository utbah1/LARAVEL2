<x-layouts.app :title="__('Products')">
    <div class="mb-6 w-full">
        <flux:heading size="xl">Product List</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage product data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex items-center justify-between mb-4">
        <form method="GET" action="{{ route('products.index') }}" class="flex w-full max-w-lg gap-2">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}" class="flex-1 rounded border border-gray-600 bg-gray-900 px-4 py-2 text-white placeholder-gray-400" />
            <flux:button icon="magnifying-glass" type="submit" color="gray">Cari</flux:button>
        </form>
        <flux:button icon="plus">
            <flux:link href="{{ route('products.create') }}" variant="subtle">Add Product</flux:link>
        </flux:button>
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-left text-white">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 text-white">
                @forelse($products as $key => $product)
                    <tr class="border-t border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-3 align-top">{{ $key + 1 }}</td>
                        <td class="px-4 py-3 align-top">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;" class="rounded shadow" />
                            @else
                                <em class="text-gray-400">No image</em>
                            @endif
                        </td>
                        <td class="px-4 py-3 align-top">{{ $product->name }}</td>
                        <td class="px-4 py-3 align-top text-green-400">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 align-top">
                            <div class="flex items-center gap-2">
                                <flux:link href="{{ route('products.edit', $product->id) }}" variant="subtle">Edit</flux:link>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" size="sm" color="red">Hapus</flux:button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-400">Produk tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-layouts.app>