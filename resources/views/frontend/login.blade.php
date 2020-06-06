@extends('master')

@section('main-content')
<h3 class="text-center mt-3">Login Your Account</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- hold the session message -->
@if (session()->has('message'))
    <div class="alert alert-{{session('type')}}">
        {{ session('message') }}
    </div>

@endif

<form action="{{route('login')}}"  method="POST" autocomplete="off">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" name="email" value="{{ old('email')}}" placeholder="Enter Your email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

@endsection