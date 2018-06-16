

        <!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <title>Dashboard</title>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">



        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />



</head>
<body>

<nav class="navbar navbar-default admin" >
        <div class="container">
                <h1>Administrator Dashboard</h1>

              {{--  <div class="navbar-header">

                        <h1>Admin Dashboard</h1>
                </div>--}}

        </div>

        <div>
                <ul class="nav navbar-nav">
                        <li><a class="nav-link ml-auto" href="/">На главную</a></li>
                </ul>
        </div>


                <div>

        <ul class="nav navbar-nav navbar-right">

                @if (Auth::check () && Auth::user()->is_admin)
                        <li><a class="nav-link ml-auto" href="/admin/dashboard">{{Auth::user()->name}}{{'@'}}ADMIN</a></li>
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                @elseif (Auth::check ())
                        <li><a class="nav-link ml-auto" href="#">{{Auth::user()->name}}</a></li>
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                @else

                        <li><a href="/register"><span class="glyphicon glyphicon-user"></span>Register</a></li>
                        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @endif

        </ul>
        </div>

</nav>
        <div class=" col-xs-12 col-md-4">
        <ul class="nav flex-column ">

                <li class="nav-item">
                        <a class="nav-link active" href="/admin/dashboard/news">News</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard/comments">Comments (awaiting for confirmation)</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard/comments_all">Comments (all)</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard/users">Users</a>
                </li>



                <li class="nav-item">
                        <a class="nav-link" href="#">Advertisement</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link disabled" href="#">Menu</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link disabled" href="/admin/dashboard/colors">Colors</a>
                </li>

        </ul>
        </div>




<div class="container">
        <div class="row">
                <div class="col">

                        @yield('content')
                </div>
        </div>
</div>


{{--<h1>Registered Users</h1>--}}
{{--<ul>--}}

 {{--@forelse ($users as $user)--}}
                {{--<li>{{ $user->name}} ({{ $user->email }})</li>--}}
        {{--@empty--}}
                {{--<li>No registered users</li>--}}
        {{--@endforelse--}}

{{--</ul>--}}
        {{--</div>--}}

{{--</div>--}}
{{--</div>--}}


<form action="" method="post">
        <div class="form-group">
                <textarea class="form-control" name="content" id="input" rows="5"></textarea>
        </div>
        {{csrf_field ()}}


</form>

{{--<script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>--}}







        <footer class="text-center">
                <p>&copy Copyright NEWS</p>
        </footer>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>


</body>
</html>



