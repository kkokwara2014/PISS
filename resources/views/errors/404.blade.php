@extends('errors.layout.app')

@section('content')
    <div style="margin-right: 200px;margin-left: 200px;padding-top: 90px;padding-bottom: 90px;">
        <div class="card text-center">
            <div class="card-body border rounded" style="padding-top: 40px;padding-bottom: 50px;">
                <h1 class="card-title" style="font-size: 120px;font-family: Montserrat, sans-serif;font-weight: bold;">404</h1>
                <h2 class="card-title" style="font-family: Montserrat, sans-serif;">Page Not Found Error!</h2>
                <p class="card-text" style="font-size: 25px;">The page you are looking for might have been removed, had its name changed or it's temporarily unavailable.</p><a class="btn btn-primary text-dark" role="button" style="background-color: rgb(253,170,13);margin-top: 20px;" href="{{ route('login') }}">Home Page</a></div>
        </div>
    </div>
@endsection
    