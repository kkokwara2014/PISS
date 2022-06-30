@extends('errors.layout.app')

@section('content')
<div style="margin-right: 200px;margin-left: 200px;padding-top: 90px;padding-bottom: 90px;">
    <div class="card text-center">
        <div class="card-body border rounded" style="padding-top: 50px;padding-bottom: 50px;">
            <h1 class="card-title" style="font-size: 120px;font-family: Montserrat, sans-serif;font-weight: bold;">419</h1>
            <h2 class="card-title" style="font-family: Montserrat, sans-serif;">Session Expired Error!</h2>
            <p class="card-text" style="font-size: 25px;">Something went wrong. Please try again later.</p><a class="btn btn-primary text-dark" role="button" style="background-color: rgb(253,170,13);margin-top: 20px;" href="{{ route('login') }}">Home Page</a></div>
    </div>
</div>
@endsection