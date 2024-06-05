
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Property</h2>
    <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $property->title }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($property->image)
                <img src="{{ Storage::url($property->image) }}" alt="{{ $property->title }}" class="img-thumbnail mt-2" width="200">
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $property->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $property->location }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" required>
        </div>

        <div class="form-group">
            <label for="facilities">Facilities:</label>
            <input type="text" class="form-control" id="facilities" name="facilities" value="{{ $property->facilities }}">
        </div>

        <div class="form-group">
            <label for="available_from">Available From:</label>
            <input type="date" class="form-control" id="available_from" name="available_from" value="{{ $property->available_from }}" required>
        </div>

        <div class="form-group">
            <label for="available_to">Available To:</label>
            <input type="date" class="form-control" id="available_to" name="available_to" value="{{ $property->available_to }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

