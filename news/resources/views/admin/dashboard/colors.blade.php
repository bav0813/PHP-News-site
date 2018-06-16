@extends('admin.dashboard.index')

@section('content')
    <h1>Color settings*: </h1>
    <p style="color: #FF0000"><b>*Changes will not be applied to administrator dashboard!!!<br>
        To check changes please refer to main page</b></p>

    <form method="post">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        <div class="col-md-4">



            <label for="color_header">Header Color:</label>
            <p>please input new color like "green" or #00FF00 </p>
            <input type="text" class="form-control" name="color_header"  value="{{$colors->color_header}}">

            <br>
            <label for="color_background">Background Color:</label>
            <p>please input new color like "green" or #00FF00 </p>
            <input type="text" class="form-control" name="color_background"  value="{{$colors->color_bg}}">


            <input type="submit" value="Submit">

        </div>
    </form>
    <br>



@endsection