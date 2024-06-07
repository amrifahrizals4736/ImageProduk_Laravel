<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center p-3">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($products as $product)
                    <div class="card m-4">
                        <div class="card-body">
                            <div class="gambar">
                                @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="max-width: 150px;"/>
                                @endif
                            </div>
                            <div class="d-flex flex-column align-items-center pt-2">  
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">${{ $product->price }}</p>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</body>
</html>
