@extends('master')

@section('main-content')

<a href="{{route('categories.index')}}" class="btn btn-info">Category List</a>
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

<form action="{{route('categories.store')}}" method="post">
    @csrf
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label class="font-weight-bold">Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name">
        </div>
    </div>
    
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label class="font-weight-bold">Category Status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
        </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Add Category</button>
    </div>
</form>
@endsection