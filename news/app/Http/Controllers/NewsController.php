<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Comments;
use App\Colors;
use App\News;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use PhpParser\Comment;


class NewsController extends Controller
{
    private $categories,$news,$top5Commentators,$top3Themes;

    public function index(){

        $this->getAllCategories ();
        $this->getTop5Commentators ();
        $this->getTop3Themes();

        //    $colors = Colors::find(1);

       // dd($colors->color_header);
      //  View::share('colors', $colors->color_header);


        for ($i=1;$i<=count($this->categories);$i++)
        {
            $this->news[$i]=DB::table('news')->where('category',$i)->orderBy('created_at','desc')->limit(5)->get();
        }


        return view('news.main')->with([
            'news1'=>$this->news[1],
            'news2'=>$this->news[2],
            'news3'=>$this->news[3],
            'news4'=>$this->news[4],
            'news5'=>$this->news[5],
            'news6'=>$this->news[6],
            'news7'=>$this->news[7],
            'commentator'=>$this->top5Commentators,
             'theme'=>$this->top3Themes
            //'colors'=>$colors->color_header

        ]);
    }


    public function getAllCategories(){
        $this->categories=DB::select('select category from news where is_active=? group by category',[1]);

        return $this->categories;

    }

    public function getTop5Commentators(){
       // $this->top5Commentators=App\Comments::all()->groupBy ('user_id')->sortByDesc ('user_id')->take(5);
        $this->top5Commentators=DB::select('select `users`.`name`, count(comment) as cnt from comments join users on comments.`user_id` = users.id group by users.name order by cnt desc limit 5');

        return $this->top5Commentators;

    }

    public function getTop3Themes(){
        $this->top3Themes=DB::select('select `news`.`id`,`news`.`title`, `categories`.`category_descr`, `comments`.`created_at`, count(comment) as cnt from comments join news on comments.`news_id` = news.id join categories on news.category=categories.id group by `news`.`id`,`news`.`title`,`categories`.`category_descr`, `comments`.`created_at` having `comments`.`created_at` >= (CURDATE()-1) order by cnt desc limit 3
');
        //dd($this->top3Themes);
        return $this->top3Themes;

    }



    public function categoryindex($category){


        $newsPerPage=5;
        $cat=DB::table ('categories')->where('category_descr',$category)->first();
        $news=App\News::where('category',$cat->id)->orderBy('created_at','desc')->paginate($newsPerPage);//works



        return view('news.showcategory')->with(['news' => $news,'category'=>$category,'category_ru'=>$cat->category_ru]);
    }



    public function showSingleNew($category,$pageID){

        $cat=DB::table ('categories')->where('category_descr',$category)->first();

        $news=DB::table ('news')->where('category',$cat->id)->where('id',$pageID)->get(); //works
        $comments=DB::table ('comments')
            ->join('news','news.id','=','comments.news_id')
            ->join('users','users.id','=','comments.user_id')
            ->select ('news.*','comments.*','users.name')
            ->where('news.id',$pageID)
            ->where ('comments.is_active',1)
            ->orderBy ('comments.vote_like','desc')
            ->get();

      //  dd($news);
        return view('news.shownews')->with([
            'news' => $news[0],
            'category'=>$cat->category_ru,
            'comments'=>$comments,
            'category_en'=>$cat->category_descr]);

    }




}
