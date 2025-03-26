<div class="card h-100 shadow-sm text-center" style="width: 18rem;">
    <img src="{{ $image }}" class="card-img-top" alt="Gambar Produk" style="height: 180px; object-fit: cover;">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text flex-grow-1">{{ $text }}</p>
        <a href="{{ $link }}" class="btn btn-primary mt-auto">Lihat Produk</a>
    </div>
</div>