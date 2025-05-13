<x-layouts.app :title="'Tambah Kategori'">
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <flux:input name="name" label="Nama Kategori" class="mb-3" />
        <flux:input name="slug" label="Slug (URL)" class="mb-3" />
        <flux:textarea name="description" label="Deskripsi" class="mb-4" />

        <flux:button type="submit" variant="primary">Simpan</flux:button>
        <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>
