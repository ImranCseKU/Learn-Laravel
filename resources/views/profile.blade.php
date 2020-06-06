<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Instead manually include bootstrap.js, bootstrap.css , popper.js we can use LARAVEL MIX  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> -->
    
    <!-- fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9d28b7cdc0.js" crossorigin="anonymous"></script>
    <link rel="title icon" type="image/png" href="images/title-img.png">

    <!-- External Css File -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Admin Dashboard</title>
    
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-expand-md navbar-light">
        
        <button type="button" class="navbar-toggler bg-light ml-auto mb-2" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">  <!--'sidebar' is not a bootstrap class-->
                        <a href="{{url('/')}}" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">CodeAndCreate</a>   <!--'bottom-border' is not a bootstrap class-->
                        <div class="bottom-border pb-3">
                            <img src="{{asset('images/admin.jpeg')}}" width="50" class="rounded-circle mr-3">
                            <a href="#" class="text-white">{{ ucwords( Auth::user()->name ) }}</a>
                        </div>

                        <ul class="navbar-nav flex-column mt-3">
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2  current"> <i class="fas fa-home fa-lg text-light mr-3"></i>Dashboard</a></li> <!--'.current' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-user fa-lg text-light mr-3"></i>Profile</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="{{route('categories.index')}}" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-envelope fa-lg text-light mr-3"></i>Category</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="{{route('posts.index')}}" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-shopping-cart fa-lg text-light mr-3"></i>Posts</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-chart-line fa-lg text-light mr-3"></i>Analytics</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-chart-bar fa-lg text-light mr-3"></i>Charts</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-table fa-lg text-light mr-3"></i>Tabels</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-wrench fa-lg text-light mr-3"></i>Settings</a></li> <!--'sidebar-link' is not a bootstrap class-->
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"> <i class="fas fa-file-alt fa-lg text-light mr-3"></i>Documentation</a></li> <!--'sidebar-link' is not a bootstrap class-->
                        </ul>
  
                    </div>
                    <!-- end of sidebar -->

                    <!-- top-nav -->
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">     <!--'top-navbar' is not a bootstrap class-->
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                            </div>
                            <div class="col-md-5">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="Search...">   <!--'search-input' is not a bootstrap class-->
                                        <button type="button" class="btn btn-light active search-button"><i class="fas fa-search text-danger"></i></button>   <!--'search-button' is not a bootstrap class-->
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <ul class="navbar-nav">
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments fa-lg text-muted"></i></a></li> <!--'icon-parent' and 'icon-bullet' are not a bootstrap class-->
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell fa-lg text-muted"></i></a></li> <!--'icon-parent' and 'icon-bullet' are not a bootstrap class-->
                                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of top-nav -->
                </div>
            </div>
        </div>
    </div>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>

    </div>
    <!-- end of modal -->
        
    <!-- card -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-5">
                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- first card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Latest Post</h5>
                                            <h3>135</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Refresh</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- second card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Comments</h5>
                                            <h3>56</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Refresh</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- third card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-info"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Users</h5>
                                            <h3>206</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Refresh</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                            <!-- forth card -->
                            <div class="card card-common">  <!--'card-common' is not a Bootstrap class-->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-chart-line fa-3x text-danger"></i>
                                        <div class="text-right text-secondary">
                                            <h5>Visitors</h5>
                                            <h3>460</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>Refresh</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end of card -->



    <!-- activities / quick post -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center mb-5">
                        <div class="col-xl-7">
                            <h4 class="text-muted mb-4">Recent Customers Activities</h4>

                            <div id="accordion">
                                <!-- first card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseOne">
                                            <img src="{{asset('images/cust1.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Shoron posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse show" id="collapseOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>
                                <!-- second card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseTwo">
                                            <img src="{{asset('images/cust2.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Durjoy posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse" id="collapseTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>
                                <!-- third card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseThree">
                                            <img src="{{asset('images/cust3.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Oishi posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse" id="collapseThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>
                                <!-- fourth card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFour">
                                            <img src="{{asset('images/cust4.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Alice posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse" id="collapseFour" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>
                                <!-- fifth card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFive">
                                            <img src="{{asset('images/cust5.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Tanvir posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse" id="collapseFive" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>
                                <!-- sixth card -->
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseSix">
                                            <img src="{{asset('images/cust6.jpeg')}}" class="mr-3 rounded" width="50px">
                                            Anisha posted a new comment
                                        </button>
                                    </div>

                                    <div class="collapse" id="collapseSix" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum unde laudantium veniam nostrum asperiores! Tempora accusamus eveniet non ducimus blanditiis.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- quick status -->
                        <div class="col-xl-5">
                        <div class="bg-dark text-white p-4">
                                <h4 class="mb-5">Coversion Rates</h4>

                                <h6 class="mb-3">Google Chrome</h6>
                                <div class="progress mb-4" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%"> 91%</div>
                                </div>
                                <h6 class="mb-3">Mozilla Firefox</h6>
                                <div class="progress mb-4" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 82%"> 82%</div>
                                </div>
                                <h6 class="mb-3">Opera</h6>
                                <div class="progress mb-4" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped font-weight-bold bg-danger" style="width: 67%"> 67%</div>
                                </div>
                                <h6 class="mb-3">Safari</h6>
                                <div class="progress mb-4" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped font-weight-bold bg-info" style="width: 10%"> 10%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of activities / quick post -->


    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row border-top pt-3">
                        <div class="col-lg-6 text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-2"><a href="#" class="text-dark">CodeAndCreate</a></li>
                                <li class="list-inline-item mr-2"><a href="#" class="text-dark">About</a></li>
                                <li class="list-inline-item mr-2"><a href="#" class="text-dark">Support</a></li>
                                <li class="list-inline-item mr-2"><a href="#" class="text-dark">Blog</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-6 text-center">
                            <p>&copy; 2019 Copyright. Made with <i class="fas fa-heart text-danger"></i> by <span class="text-success">CodeAndCreate</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->
    
    



    <!-- jQuery, Popper js, Bootstrap -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <!-- Laravel resources (webpack.mix.js) -->
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Optional JavaScript -->
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>