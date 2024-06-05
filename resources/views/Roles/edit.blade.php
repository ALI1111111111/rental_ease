@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Role</h2>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->role_name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
