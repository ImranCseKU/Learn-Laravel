@extends('master')

@section('main-content')

<a href="{{route('categories.index')}}">Category List</a>
<h1 class="font-weight-bold mb-3" style="color:#DCDCDC">Create Category</h1>
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

<form action="{{route('categories.update', $category->id)}}" method="post">
    @csrf
    @method('put')
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label class="font-weight-bold">Category Name</label>
        <input type="text" class="form-control" value="{{$category->name}}" name="name">
        </div>
    </div>
    
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label class="font-weight-bold">Category Status</label>
        <select name="status" class="form-control">
            <option value="1" @if($category->status == 1) selected @endif >Active</option>
            <option value="0" @if($category->status == 0) selected @endif >Deactive</option>
        </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </div>
</form>
@endsection