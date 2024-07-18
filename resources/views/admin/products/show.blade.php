@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-white">Product Details</h1>
            <div class="card">
                <div class="card-body text-black">
                    <h5 class="card-title text-black"><strong>Name:</strong> {{ $product->name }}</h5>
                    <p class="card-text text-black"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="card-text text-black"><strong>Price:</strong> ${{ $product->price }}</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
