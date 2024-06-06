<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .category-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->category_name }}</h5>
                            <a href="{{ route('categor.show', $category->id) }}" class="btn btn-primary">View Properties</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
