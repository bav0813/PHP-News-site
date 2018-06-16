<?php

namespace App\Http\Controllers;
use DB;
use App\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->search;
 //       $articles = DB::table ( 'news' )->where ( 'description' , 'LIKE' , '%' . $query . '%' )->paginate ( 10 );
 //       $articles = News::where ( 'description' , 'LIKE' , '%' . $query . '%' )->paginate ( 10 );
        $articles=DB::table('news')
            ->join ('categories','categories.id','=','news.category')
            ->select('news.id as news_id','news.*','categories.*')
            ->where('news.description','LIKE','%'.$query.'%')
            ->paginate(10);
        //return view ( 'page.search' , compact ( 'articles' , 'query' ) );
       // dd($articles);

     //   $pos=strpos($articles[0]->description,$query);
       // dd($pos);

        return view ( 'search')->with(['articles' => $articles,'query'=>$query]);
    }

    public function livesearch(Request $request,$str)
    {
        $query = $str;
        $resp='';
        //       $articles = DB::table ( 'news' )->where ( 'description' , 'LIKE' , '%' . $query . '%' )->paginate ( 10 );
        //       $articles = News::where ( 'description' , 'LIKE' , '%' . $query . '%' )->paginate ( 10 );
        $articles=DB::table('news')

            ->select('news.tags')
            ->groupby('news.tags')
           // ->where('news.tags','LIKE','%'.$query.'%')
           ->having('news.tags','LIKE','%'.$query.'%')
            ->get();
    foreach ($articles as $key => $article){
        $resp.="<a href='/livesearch/results/{$article->tags}'>".$article->tags.'</a><br>';
    }

        //return view ( 'page.search' , compact ( 'articles' , 'query' ) );
        // dd($articles);

        //   $pos=strpos($articles[0]->description,$query);
         //dd($articles);

        return response($resp);
    }

    public function livesearchResults(Request $request,$str)
    {
        $articles=DB::table('news')
            ->join ('categories','categories.id','=','news.category')
            ->select('news.id as news_id','news.*','categories.*')
            ->where('news.tags',$str)
            ->paginate(5);
       // dd($articles);
        return view ( 'searchres')->with(['articles' => $articles]);


    }
}
