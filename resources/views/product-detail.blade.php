<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">SShop</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Detail Produk</h2>
        <div class="card p-4">
            <h3>Produk ID: {{ $id }}</h3>
            <p>Deskripsi produk akan ditampilkan di sini.</p>
            <a href="/cart" class="btn btn-success">Tambah ke Keranjang</a>
        </div>
    </div>
</body>
</html>
