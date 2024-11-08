@extends('admin.layout.layout')

@section('content')
    <h2>Edit User</h2>
    <form action="{{  route(  "users.update" , ["user" => $user->id]  )}}" method="POST">
        @method('PUT')
        @csrf
        <div class="input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="full_name" value="{{ $user->full_name }}">
            <small class="text-danger">{{ $errors->first('full_name') }}</small>
        </div>
        <div class="input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="input">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="input">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            <small class="text-danger">{{ $errors->first('confirmPassword') }}</small>
        </div>
        <div class="input">
            <button class="btn" title="Update User">
                <span>
                    Update User
                </span>
            </button>
        </div>
    </form>

@endsection