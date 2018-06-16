@extends('base')
@section('content')


<h1>{{ $category_ru }}</h1>

<div class="row text-center">
    <div class="col-sm-4">
        <div class="thumbnail">

            <ul>

                @foreach ($news as $new)
                    <a href="/{{ $category }}/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>

                @endforeach



            </ul>

            {{ $news->links() }}
        </div>
    </div>
</div>



@endsection