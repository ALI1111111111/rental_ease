@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Role</h2>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
