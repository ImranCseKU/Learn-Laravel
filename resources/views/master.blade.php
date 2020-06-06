<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{config('app.name')}} </title>

        <!-- Instead manually include bootstrap.js, bootstrap.css , popper.js we can use LARAVEL MIX  -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!--Bootstrap CSS Styles -->
        <!-- <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
        
        <!-- custome css -->
        <link rel="stylesheet" href="https://getbootstrap.com/docs/4.4/examples/blog/blog.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">


    </head>
    <body>
        <div class="container" id="app">
            <!-- part 1: navbar (put every page) -->
            @include('partial.navbar')
            <!-- part 2: jumbotron(only for Home page) -->
            @yield('jumbotron')
        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-9 blog-main">
                    
                    <!-- part 3:Main Content -->
                    @yield('main-content')

                </div><!-- /.blog-main -->



                <!-- Part 4: Sidebar (put every page) -->
                @include('partial.sidebar')


            </div><!-- /.row -->

        </main><!-- /.container -->



        <!-- part 5: Footer (put every page) -->
        @include('partial.footer')

        <!-- jQuery -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
        
        <!-- Laravel resources (webpack.mix.js) -->
        <script src="{{ asset('/js/app.js') }}"></script>

        <script>
            $( document ).ready(function() {
                Echo.channel('post.created')
                .listen('PostCreated', (e) => {
                    // console.log(e.post);
                    
                    $.notify(e.post.title + ' new post has been published now');
                });

                /*Echo.private('post.created')
                .listen('PostCreated', (e) => {
                    // console.log(e.post);
                    
                    $.notify(e.post.title + ' new post has been published now');
                });*/

            });

        </script>


    </body>
</html>
