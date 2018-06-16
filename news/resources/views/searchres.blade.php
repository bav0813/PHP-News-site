@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search results</div>

                    <div class="panel-body search">
                        @foreach ($articles as $article)
                            <H3><a href="/{{$article->category_descr}}/{{$article->news_id}}">{{$article->title}} {{$article->news_id}} </a></H3>
                            <h4>{{$article->created_at}}</h4>


                        @endforeach




                        {{ $articles->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection