@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search results</div>

                    <div class="panel-body search">
                        @foreach ($articles as $article)
                            <H3><a href="news/{{$article->news_id}}">{{$article->title}} {{$article->news_id}} </a></H3>
                            <h4>{{$article->created_at}}</h4>

                        @php

                            $findtext = $query;
                            $pattern = "/.{0,30}(".$findtext.").{0,30}/siu";
                            $replace = '$1<b style="color:#FF0000; background:#FFFF00;">$2</b>';
                                preg_match_all($pattern,$article->description,$m);
                     //           echo var_export($m,1);
                             $pattern_highlight = "/((?:^|>)[^<]*)(".$findtext.")/siu";

                    $search_res='';
                    foreach ($m[0] as $res){
                     $text = preg_replace($pattern_highlight, $replace, $res);
                   $search_res.=$text.'........';
                    }
                     echo"<hr />".$search_res."<hr />";
                        @endphp

                            <hr>
                        @endforeach



                        {{--@foreach ($articles as $article)--}}
                            {{--<H3><a href="/{{$article->category_descr}}/{{$article->news_id}}">{{$article->title}} {{$article->news_id}} </a></H3>--}}
                            {{--<h4>{{$article->created_at}}</h4>--}}
                            {{--<a href="/{{$article->category_descr}}/{{$article->news_id}}">{{str_limit ($article->description),150}}</a><br>--}}
                        {{--@endforeach--}}
                            {{ $articles->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection