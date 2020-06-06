@extends('master')

@section('main-content')
    <a href="{{route('categories.create')}}" class="btn btn-info mb-2">Add Category</a>
    <!-- hold the session message -->
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
        {{ session('message') }}
        </div>
    @endif
    <h1 class="font-weight-bold mb-4" style="color:#DCDCDC">Categories List</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->status== 1 ? 'Active' : 'Deactive'}}</td>
                    <td>
                        <a href="{{route('categories.show', $row->id)}}" class="btn btn-info">Details</a>
                        <a href="{{route('categories.edit', $row->id)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links()}}
@endsection