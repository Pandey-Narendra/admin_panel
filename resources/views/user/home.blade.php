@extends('layouts.user')

@section('content')
    <h1 class="text-white">Home Page</h1>
    <p class="text-white">Welcome to the user home page!</p>

    <div class="row mt-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Big Card Title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Small Card 1</h5>
                    <p class="card-text">More example content to show how cards work in Bootstrap.</p>
                    <a href="#" class="btn btn-primary">Go somewhere else</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Small Card 2</h5>
                    <p class="card-text">More example content to show how cards work in Bootstrap.</p>
                    <a href="#" class="btn btn-primary">Go somewhere else</a>
                </div>
            </div>
        </div>
    </div>
@endsection
