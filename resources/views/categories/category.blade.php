<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .property-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .property-card:hover {
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
        <h2>{{ $category->name }}</h2>
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4">
                    <div class="card property-card">
                        <img src="{{ asset('images/' . $property->image) }}" class="card-img-top" alt="{{ $property->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#propertyModal{{ $property->id }}">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="propertyModal{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="propertyModalLabel{{ $property->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="propertyModalLabel{{ $property->id }}">{{ $property->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('images/' . $property->image) }}" class="img-fluid" alt="{{ $property->title }}">
                                <p>Description: {{ $property->description }}</p>
                                <p>Location:  {{ $property->location }}</p>
                                <p>Price:     {{ $property->price }}</p>
                                <p>facilities:  {{ $property->facilities }}</p>


                            </div>
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
