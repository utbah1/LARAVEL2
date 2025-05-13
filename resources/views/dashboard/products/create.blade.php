<x-layouts.app :title="__('Add Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Fill out the form to add a product.</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <flux:input label="Product Name" name="name" value="{{ old('name') }}" class="mb-3" />
        <flux:input label="Price" name="price" type="number" step="0.01" value="{{ old('price') }}" class="mb-3" />

        <flux:select name="category_id" label="Category" class="mb-3">
            <option disabled selected>-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </flux:select>
        <flux:input type="file" name="image" label="Gambar Produk" class="mb-3" />
        <flux:separator />
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Save</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>