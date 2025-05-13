<x-layouts.app :title="__('Edit Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update the product details.</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <flux:input label="Product Name" name="name" value="{{ $product->name }}" class="mb-3" />
        <flux:input label="Price" name="price" type="number" step="0.01" value="{{ $product->price }}" class="mb-3" />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>