<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <title>News!</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">



    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />



    {{--<script type="text/javascript">--}}
        {{--function goout() {--}}
            {{--return "Вы действительно хотите покинуть сайт?";--}}
        {{--}--}}
    {{--</script>--}}



</head>
{{--<body onbeforeunload="return goout()">--}}
<body style="background-color:{{$colors->color_bg}}">
<div>



    <div class="panel panel-default">
<div class="panel-body">

    <form class="form-search" method="get" action="search">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        <span>Поиск</span>
        <input type="text" autocomplete="off" name="search" class="input-medium search-query" onkeyup="showResult(this.value)">
        <div id="livesearch"></div>
        {{--<button type="submit" class="btn">Найти</button>--}}
    </form>
</div>

</div>

<nav class="navbar navbar-default" style="background-color: {{$colors->color_header}}">
    <div class="container-fluid" id="navbarr">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">NEWS</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Главная</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Происшествия
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a  href="/world/page1">Мир</a></li>
                    <li class="dropdown-submenu">
                        <a class="test" href="#">Украина</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Киев</a></li>
                            <li><a href="#">Другие города</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/sport/page1">Спорт</a></li>
            <li><a href="/economics/page1">Экономика</a></li>
            <li><a href="/politics/page1">Политика</a></li>
            <li><a href="/technology/page1">Технологии</a></li>
            <li><a href="/world/page1">Мир</a></li>
            <li><a href="/science/page1">Наука</a></li>
        </ul>

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

<div class="container">
    <div class="row">







@yield('content')
</div>
</div>






<footer class="text-center">
    <p>&copy Copyright BAV Media 2018</p>
</footer>


<!— Modal —>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!— Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Подписаться</h4>
            </div>
            <div class="modal-body">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" id="usr">
                <label for="usr">Email:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Подписаться</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>


</body>
</html>



