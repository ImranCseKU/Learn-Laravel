@extends('master')

@section('main-content')
<h3 class="text-center mt-3">Register An Account</h3>

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

<form action="{{route('register')}}"  method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="form-group">
        <label for="exampleInputName1">Username</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Username">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" name="email" value="{{ old('email')}}" placeholder="Enter Your email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number')}}" placeholder="Enter Your Phone Number" aria-describedby="phoneHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

@endsection