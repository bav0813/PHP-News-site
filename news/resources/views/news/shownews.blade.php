@extends('base')
@section('content')

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    {{ csrf_field() }}

    <h1> {{ $news->title }} {{ $news->id }}</h1>

    {{ $news->created_at }} <br>
    <img src="{{ $news->pics }}"><br>

    {{ $news->description }}

    <div>
        <br>
        <b><p id="reading"></p></b>
        <b><p id="total"></p></b>


        <script>
            var reading = document.getElementById("reading");
            var ttl = document.getElementById("total");
            var interval = setInterval(change, 3000);
            var rd,total=0;


            function change() {
                rd=Math.floor(Math.random()*5);
                reading.innerHTML = 'Читают: '+rd;
                total+=rd;
                ttl.innerHTML = 'Всего прочли: '+total;
            }



        </script>




    <div>
        <span>Теги:</span>
        <a href="#">{{ $news->tags }}</a>
    </div>

    <br>

    <div>
        <h4>Комментарии</h4>
        <div class="form-group">
            <form method="post" action="/{{$category_en}}/{{$news->id}}/comments">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{ csrf_field() }}
                <label for="comment">Добавьте комментарий:</label>
                <textarea name="comment_body" class="form-control" rows="5" id="comment" style="width: 300px"></textarea>
                <button>Добавить</button>
            </form>
        </div>
        <hr>
        <div>
            <br>
            <p>
                <div class="comments">
                    <ul class="list-group">

                        @foreach ($comments as $comm)

                            <li class="list-group-item">
                                <a href="#"> {{$comm->name}}</a> {{$comm->updated_at}} <br> {{$comm->comment}}<br>
                            <button type="button" id="vote_like_{{$comm->id}}" name="{{$comm->id}}"><span class="glyphicon glyphicon-thumbs-up" ></span>{{$comm->vote_like}}</button>

                            <button type="button" id="vote_dislike_{{$comm->id}}" name="{{$comm->id}}"><span class="glyphicon glyphicon-thumbs-down"></span>{{$comm->vote_dislike}}</button>

                            </li>
                         @endforeach
                    </ul>

                </div>
            </p>

        </div>
        <hr>
        <hr>
    </div>

@endsection