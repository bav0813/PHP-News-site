<?php

namespace App\Http\Controllers\Admin;

use App\Users;
use App\Comments;
use App\Colors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //





    public function index()
    {
        $users = Users::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard.index')->with('users', $users);
    }


    public function adminNews()
    {
       // $users = Users::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard.news');
    }

    public function adminComments()
    {
       //  $comments = Comments::orderBy('created_at', 'desc')->get();
        $comments = Comments::where('is_active',0)->orderBy('created_at', 'desc')->get();


        return view('admin.dashboard.comments')->with('comments',$comments);
    }

    public function adminCommentsAll()
    {
          $comments = Comments::orderBy('created_at', 'desc')->get();
        //$comments = Comments::where('is_active',0)->orderBy('created_at', 'desc')->get();


        return view('admin.dashboard.comments_all')->with('comments',$comments);
    }

    public function adminUsersGet()
    {
        $users = Users::orderBy('id')->get();

        return view('admin.dashboard.users')->with('users',$users);
    }

    public function adminColorsGet()
    {
       // $colors = Colors::get();

        return view('admin.dashboard.colors');
    }


    public function adminColorsSet(Request $request)
    {
        $colors = Colors::find(1);
        $colors->color_header=$request->color_header;
        $colors->color_bg=$request->color_background;
        $colors->save();

        return redirect('/');
    }



    public function renewusers(Request $request,$id,$status)
    {

        $user = Users::find($id);

        $user->is_active=$status;
        $user->save();



        return redirect ('/admin/dashboard/users');
    }

    public function renewcomments(Request $request,$id,$status)
    {

        $comment = Comments::find($id);

        $comment->is_active=$status;
        $comment->save();
     //   dd($comment);



        return redirect ('/admin/dashboard/comments');
    }


    public function editcomments(Request $request,$id,$msg)
    {

        $comment = Comments::find($id);

        $comment->comment=$msg;
        $comment->save();
      //  dd($comment);



        return redirect ('/admin/dashboard/comments_all');
    }

}
