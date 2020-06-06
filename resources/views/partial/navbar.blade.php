<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
        <!-- <a class="text-muted" href="#">Subscribe</a> -->
        <p class="text-muted"> @current_time </p> <!--@current_time is a custome directive-->
    </div>
    <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{url('/')}}">{{config('app.name')}}</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>

        <!-- if user Logged In -->
        @auth 
        <a class="btn btn-sm btn-outline-secondary" href="{{route('profile')}}">Profile ({{ optional(Auth::user())->name}})</a>
        <a class="btn btn-sm btn-outline-secondary ml-2" href="{{route('logout')}}">Logout</a>
        @endauth

        <!-- if user not authenticated -->
        @guest 
        <a class="btn btn-sm btn-outline-secondary" href="{{route('login')}}">Sign In</a>
        <a class="btn btn-sm btn-outline-secondary ml-2" href="{{route('register')}}">Sign up</a>
        @endguest


    </div>
    </div>
</header>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    

    @if( \Request::is('/'))
        @foreach($links as $title => $url)
            <a class="p-2 text-muted" href="{{$url}}">{{$title}}</a>
        @endforeach
    @else
        <a class="p-2 text-muted" href="#">U.S.</a>
        <a class="p-2 text-muted" href="#">Technology</a>
        <a class="p-2 text-muted" href="#">Design</a>
        <a class="p-2 text-muted" href="#">Culture</a>
        <a class="p-2 text-muted" href="#">Business</a>
        <a class="p-2 text-muted" href="#">Politics</a>
        <a class="p-2 text-muted" href="#">Opinion</a>
        <a class="p-2 text-muted" href="#">Science</a>
        <a class="p-2 text-muted" href="#">Health</a>
        <a class="p-2 text-muted" href="#">Style</a>
        <a class="p-2 text-muted" href="#">Travel</a>

    @endif
    
    </nav>

</div>