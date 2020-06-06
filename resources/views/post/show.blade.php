@extends('master')

@section('main-content')
<a href="{{route('categories.index')}}" class="btn btn-info">Category List</a>
<a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>

<h1 class="font-weight-bold my-3" style="color:#DCDCDC">Category Details</h1>

<p> ID: {{$category->id}}</p>
<p> ID: {{$category->name}}</p>
<p> ID: {{$category->status == 1? 'Active' : 'Deactive'}}</p>

<div>
    <form action="{{route('categories.delete', $category->id)}}" method="post" onclick="return confirm('Are you sure?')">
        @csrf 
        @method('DELETE')
        <button class="btn btn-outline-danger text-dark">Do You Want To Delete Catgegory?</button>
    </form>
</div>
@endsection