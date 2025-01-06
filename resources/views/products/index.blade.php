<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            @auth
                <span class="navbar-text">
                    Welcome, {{ Auth::user()->name }}
                </span>
            @endauth
            <div class="d-flex ms-auto">

                <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                <a class="nav-link ms-3" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>List of Products</h2>
        
        <a class="btn btn-primary mb-3" href="{{ route('products.create') }}" role="button">New Product</a>

        <table class="table table-striped">
            <thead>  
                <tr> 
                    <th>ID</th>
                    <th>Name</th>     
                    <th>Description</th>
                    <th>Price</th>  
                    <th>Image</th>  
                    <th>Actions</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td><img src="{{ $product->image_URL }}" alt="Product Image" style="max-width: 100px; max-height: 100px;"></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
