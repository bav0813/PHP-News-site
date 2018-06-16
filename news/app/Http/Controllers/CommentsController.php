<?php

namespace App\Http\Controllers;

use DB;
use App\News;
use Auth;
use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    //


    public function __construct()
    {
  //      $this->middleware('auth')->only('store'); //works

        $this->middleware('auth')->except ('store','search');

    }



    public function store($category,$pageID)
    {

        //test
        if (!Auth::check()){
            $user=\App\Users::whereName("Anonymous")->firstOrFail();


        }
        else {
            $user = Auth()->user();


        }

        if ($category=='politics') {
            $is_active=0;
        }
        else
            $is_active=1;

       Comments::create([
            'comment'=>request ('comment_body'),
            'news_id'=>$pageID,
            'is_active'=>$is_active,
           // 'user_id'=>auth()->user()->id
            'user_id'=>$user->id



        ]);



        return back ();
    }

    public function search($user_name) {
        //$comments=DB::table ('comments')->where('category',$cat->id)->where('id',$pageID)->get();
        $comments=DB::table('comments')
            ->join ('users','users.id','=','comments.user_id')
            ->select('users.*','comments.*')
            ->where('users.name',$user_name)
            ->paginate(5);

        return view ( 'news.top_commentors')->with(['top_commentors' => $comments,'username'=>$user_name]);

    }

    public function vote_like(Request $request,$id,$value) {
        //$comments=DB::table ('comments')->where('category',$cat->id)->where('id',$pageID)->get();
       // $comments=DB::table('comments')
         $comments=Comments::find($id);
   //      dd($id);
        $comments->vote_like=$value;
        $comments->save();
//dd($id);
        return response($comments);

    }

    public function vote_dislike(Request $request,$id,$value) {
        //$comments=DB::table ('comments')->where('category',$cat->id)->where('id',$pageID)->get();
        // $comments=DB::table('comments')
        $comments=Comments::find($id);
        //      dd($id);
        $comments->vote_dislike=$value;
        $comments->save();
//dd($id);
        return response($comments);

    }
}
