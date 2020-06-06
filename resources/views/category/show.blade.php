@extends('master')

@section('main-content')
<a href="{{route('categories.index')}}" class="btn btn-info">Category List</a>
<a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>

<h1 class="font-weight-bold my-3" style="color:#DCDCDC">Category Details</h1>

<p> <span class="font-weight-bold">ID:</span>  {{$category->id}}</p>
<p> <span class="font-weight-bold">Name:</span> {{$category->name}}</p>
<p> <span class="font-weight-bold">Status:</span> {{$category->status == 1? 'Active' : 'Deactive'}}</p>

<h3 class="mt-5">Posts Under this Category</h3>
<table class="table table-striped my-3">
    <thead class="thead-dark">
        <tr>
            <th>SL</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- posts() method define inside category Model -->
        @foreach( $category->posts as $post)
            <tr>
                <td>{{ $loop->index+1}}</td>
                <td>{{ $post->title}}</td>
                <td>{{ $category->name }}</td> <!-- category is a function of Post Models -->
                <td>{{ $post->user->name}}</td>    <!-- user is a function of Post Models -->
                <td>{{ $post->status}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    <form action="{{route('categories.delete', $category->id)}}" method="post" onclick="return confirm('Are you sure?')">
        @csrf 
        @method('DELETE')
        <button class="btn btn-outline-danger text-dark mt-5">Do You Want To Delete Catgegory?</button>
    </form>
</div>
@endsection

