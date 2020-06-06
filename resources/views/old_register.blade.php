@extends('master')

@section('main-content')
<h3>Register An Account</h3>

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
    <div class="alert alert-success">
        {{ session('message') }}
    </div>

@endif

<form action="{{route('register')}}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Your email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputPhoto1">Photo</label>
        <input type="file" class="form-control" name="photo" placeholder="upload photo" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection