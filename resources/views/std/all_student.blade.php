<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <style>
        a:link {
            text-decoration: none;
        }
    </style>

</head>

<body>
  

  <!-- Page Header -->
    <header class="masthead" >
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
                <h1>Resource Route</h1>
            </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-10 mx-auto">
                    
                <p>
                    <a href="{{url('/student/create')}}" class="btn btn-info">Add Student</a>

                </p>
                <h1 class="font-weight-bold mb-3" style="color:#DCDCDC">Student List</h1>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>SL</td>
                            <td>Name</td>
                            <td>roll</td>
                            <td>Address</td>
                        </tr>
                    </thead>
                    @foreach($all_std as $row)
                    <tbody>
                        <tr>
                            <td>{{$loop->index}}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->roll }}</td>
                            <td>{{ $row->address }}</td>
                            <td>
                                <a href="{{url('student/'.$row->id.'/edit')}}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{url('/student/'.$row->id)}}" method ="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                <a href="{{url('student/'. $row->id)}}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>
