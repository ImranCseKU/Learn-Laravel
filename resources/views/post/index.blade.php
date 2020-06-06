@extends('master')

@section('main-content')
    <a href="{{route('posts.create')}}" class="btn btn-info mb-2">Add Posts</a>
    <!-- hold the session message -->
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            <p class="text-center"> {{ session('message') }} </p>  
        </div>
    @endif
    <h1 class="font-weight-bold mb-4" style="color:#DCDCDC">Post List</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SL</th>
                <th>Post Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->index+1}}</td>
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->category->name }}</td> <!-- category is a function of Post Models -->
                    <td>{{ $post->user->name}}</td>    <!-- user is a function of Post Models -->
                    <td>{{ $post->status}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">Details</a>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
@endsection