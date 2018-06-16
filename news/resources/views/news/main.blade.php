@extends('base')
@section('content')


    <div id="Mycarousel" class="carousel slide" data-ride="carousel" data-interval="2000"
         xmlns="http://www.w3.org/1999/html">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="https://pbs.twimg.com/profile_images/538640740528566273/DJ9tUnPQ.jpeg" alt="1">
                <div class="carousel-caption">
                    <h3>Горячие новости</h3>
                    <p>text</p>
                </div>
            </div>
            <div class="item">
                <img src="https://pbs.twimg.com/profile_images/648786950866890752/IWpGlIfL.png" alt="2">
                <div class="carousel-caption">
                    <h3>Новости дня</h3>
                    <p>text</p>
                </div>
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJo8yQatmk5bYqXuDRKrKoJmRRgq0pelkuDRxyjVs33fLT3Aot" alt="3">
                <div class="carousel-caption">
                    <h3>Обмеження руху транспорту</h3>
                    <p>text</p>
                </div>
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0MQfcbXmrZz2D_JKNPS2M_jhim39Rg9jFBwM2eWHRmGVd7pUM-Q" alt="4">
                <div class="carousel-caption">
                    <h3>Breaking news</h3>
                    <p>text</p>
                </div>
            </div>

        </div>

        <a class="left carousel-control" href="#Mycarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#Mycarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
        <div>

        </div>
    </div>



    <div class="row">

        <div class="col-sm-3">

            <div class="container-fluid reclama">
                <h3>Рыбалка</h3>
                <h4><a href="https://www.mirrybolova.com.ua/">Mirrybolova</a></h4>
                <span>от </span>
                <span class="price">200</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

            <div class="container-fluid reclama">
                <h3>Туризм</h3>
                <h4><a href="http://www.x-zone.com.ua/">X-Zone</a></h4>
                <span>от </span>
                <span class="price">400</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>


            <div class="container-fluid reclama">
                <h3>Cуши</h3>
                <h4><a href="https://www.sushiya.ua/">Сушия</a></h4>
                <span>от </span>
                <span class="price">250</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

            <div class="container-fluid reclama">
                <h3>Пицца</h3>
                <h4><a href="https://dominos.ua">Dominos</a></h4>
                <span>от </span>
                <span class="price">180</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

        </div>

        <div class="col-sm-6">
            <div class="container-fluid">
                <h3>Происшествия</h3>
                <ul>
                    @foreach ($news1 as $new)
                        <a href="/accidents/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach


                </ul>
                <a href='/accidents/page1' class='btn more' role='button' >Больше новостей</a>
            </div>




            <div class="container-fluid">
                <h3>Спорт</h3>
                <ul>

                    @foreach ($news2 as $new)
                        <a href="/sport/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach

                </ul>
                <a href='/sport/page1' class='btn more' role='button' >Больше новостей</a>
            </div>



            <div class="container-fluid">
                <h3>Экономика</h3>
                <ul>
                    @foreach ($news3 as $new)
                        <a href="/economics/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach


                </ul>
                <a href='/economics/page1' class='btn more' role='button' >Больше новостей</a>
            </div>




            <div class="container-fluid">
                <h3>Политика</h3>
                <ul>
                    @foreach ($news4 as $new)
                        <a href="/politics/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach


                </ul>
                <a href='/politics/page1' class='btn more' role='button' >Больше новостей</a>
            </div>



            <div class="container-fluid">
                <h3>Технологии</h3>
                <ul>
                    @foreach ($news5 as $new)
                        <a href="/technology/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach


                </ul>
                <a href='/technology/page1' class='btn more' role='button' >Больше новостей</a>
            </div>




            <div class="container-fluid">
                <h3>Мир</h3>
                <ul>
                    @foreach ($news6 as $new)
                        <a href="/world/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach



                </ul>
                <a href='/world/page1' class='btn more' role='button' >Больше новостей</a>
            </div>



            <div class="container-fluid">
                <h3>Наука</h3>
                <ul>
                    @foreach ($news7 as $new)
                        <a href="/science/{{ $new->id }}">{{ $new->title }} {{ $new->id }}</a><br>
                    @endforeach


                </ul>
                <a href='/science/page1' class='btn more' role='button' >Больше новостей</a>
            </div>



            <div class="container-fluid">
                <h3>ТОП 5 Комментаторов</h3>
                <ul>
                    @foreach ($commentator as $commentator_each)
                        <li><a href="top_commentator/{{$commentator_each->name}}">{{$commentator_each->name}}</a></li>
                    @endforeach

                </ul>
            </div>

            <div class="container-fluid">
                <h3>ТОП 3 Темы</h3>
                <ul>
                    @foreach ($theme as $theme_each)
                        <li><a href="/{{$theme_each->category_descr}}/{{$theme_each->id}}">{{$theme_each->title}} {{$theme_each->id}}</a></li>

                    @endforeach
                </ul>
            </div>
            <br>
        </div>


        <div class="col-sm-3">

            <div class="container-fluid reclama">
                <h3>Pokupon</h3>
                <h4><a href="https://pokupon.ua/">Pokupon</a></h4>
                <span>от </span>
                <span class="price">1000</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

            <div class="container-fluid reclama">
                <h3>OLX</h3>
                <h4><a href="https://www.olx.ua">Olx</a></h4>
                <span>от </span>
                <span class="price">370</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

            <div class="container-fluid reclama">
                <h3>Супермаркет</h3>
                <h4><a href="https://rozetka.com.ua">Rozetka</a></h4>
                <span>от </span>
                <span class="price">2500</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>

            <div class="container-fluid reclama">
                <h3>Эльдорадо</h3>
                <h4><a href="https://eldorado.ua">Eldorado</a></h4>
                <span>от </span>
                <span class="price">650</span>
                <span> грн.</span>
                <br>
                <button type="button" class="btn btn-success kupon">Применить купон</button>
            </div>
            <div class="container-fluid skidka">
                <h4 class="kup">Купон на скидку</h4>
                <p><script type="text/javascript"> document.write("<p>"+Math.floor(Math.random()*999999)+"-"+Math.floor(Math.random()*999999)+"</p>")</script></p>
                <p>примените и получите скидку 10%</p>
            </div>






        </div>
    </div>









    </div>
@endsection