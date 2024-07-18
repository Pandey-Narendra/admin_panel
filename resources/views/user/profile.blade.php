@extends('layouts.user')

@section('content')
    <h1 class="text-white">User Profile</h1>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Profile Details</h5>
            <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
@endsection
