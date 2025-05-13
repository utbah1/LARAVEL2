<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Product Categories</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product Categories</flux:subheading>
        <flux:button as="a" href="{{ route('categories.create') }}" variant="primary" icon="plus">
            Tambah Kategori
        </flux:button>
        <flux:separator variant="subtle" />
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-left text-white">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Created At</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 text-white">
                @foreach($categories as $key => $category)
                    <tr class="border-t border-gray-700 hover:bg-gray-800">
                        <td class="px-4 py-3">{{ $key + 1 }}</td>
                        <td class="px-4 py-3">
                            @if($category->image)
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="width: 80px; height: 80px; object-fit: cover;" class="rounded shadow" />
                            @else
                                <em class="text-gray-400">No image</em>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $category->name }}</td>
                        <td class="px-4 py-3">{{ $category->slug }}</td>
                        <td class="px-4 py-3">{{ $category->description }}</td>
                        <td class="px-4 py-3">{{ $category->created_at }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <flux:link href="{{ route('categories.edit', $category->id) }}" variant="subtle">Edit</flux:link>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" size="sm" color="red">Hapus</flux:button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>