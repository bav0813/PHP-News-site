@extends('base')
@section('content')

    <h2>These are comments of user <b>{{$username}}</b></h2>
    @foreach ($top_commentors as $comm)

        <li class="list-group-item">
            <a href="#"> {{$comm->name}}</a> {{$comm->updated_at}} <br> {{$comm->comment}}<br>


        </li>
    @endforeach
    {{ $top_commentors->links() }}


@endsection