<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">SShop</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Produk</h2>
        <div class="row">
            @php
                $products = [
                    ['id' => 1, 'name' => 'Aci Bakar Standart', 'price' => 8000],
                    ['id' => 2, 'name' => 'Aci Bakar Jumbo', 'price' => 12000],
                    ['id' => 3, 'name' => 'EsTeh', 'price' => 4000]
                ];
            @endphp
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                            <a href="/products/{{ $product['id'] }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
