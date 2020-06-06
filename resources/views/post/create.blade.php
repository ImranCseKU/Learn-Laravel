@extends('master')

@section('main-content')

<!-- hold the session message -->
@if (session()->has('message'))
    <div class="alert alert-success font-weight-bold">
        <p class="text-center"> {{ session('message') }} </p>  
    </div>

@endif

<a href="{{route('posts.index')}}" class="btn btn-info">Post List</a>
<h1 class="font-weight-bold mb-3" style="color:#DCDCDC">Create Post</h1>


<!-- show error message  -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('posts.store')}}" method="post" autocomplete="off">
    @csrf
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label class="font-weight-bold">Post Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title">
        </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label class="font-weight-bold">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Choose...</option>
            @foreach( $categories as $category)
                <option value="{{$category->id}}"> {{ $category->name }} </option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label class="font-weight-bold">Post Content</label>
            <!-- <input type="text" class="form-control" placeholder="Title" name="title"> -->
            <textarea name="content" class="form-control"></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label class="font-weight-bold">Post Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-lg btn-info">Add Post</button>
    </div>
</form>
@endsection