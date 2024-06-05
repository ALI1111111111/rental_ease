@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Properties</h2>
    <a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Add Property</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Price</th>
                <th>Facilities</th>
                <th>Available From</th>
                <th>Available To</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->location }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->facilities }}</td>
                    <td>{{ $property->available_from }}</td>
                    <td>{{ $property->available_to }}</td>
                    <td>
                        @if($property->image)
                        <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->title }}" class="img-thumbnail" width="100">

                            @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
