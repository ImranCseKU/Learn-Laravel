@extends('master')

@section('jumbotron')
    @include('partial.jumbotron')
@endsection

@section('main-content')
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose 
    </h3>

    <div class="blog-post">

        @foreach( $articles as $article)
            <h2 class="blog-post-title"> {{ $article->title }} </h2>
            <p class="blog-post-meta"> {{ $article->created_at->format('F d, Y h:i A') }} By <a href="#"> {{$article->user->name }} </a> On <a href=""> {{$article->category->name}} </a> </p>
            <!-- <p class="blog-post-meta"> {{ $article->created_at->diffForHumans()}} By <a href="#"> {{$article->user->name }} </a> On <a href=""> {{$article->category->name}} </a> </p> -->
        @endforeach
    </div>

    
    <!-- <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav> -->
@endsection