<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use App\Comments;
use App\Posts;

class CommentController extends Controller
{
    public function store(Request $request){
        $input['from_user']=$request->user()->id;
        $input['on_post']=$request->input('on_post');
        $input['body']=$request->input('body');
        $slug=$request->input('slug');
        Comments::create($input);
        return redirect($slug)->with('message','Comment published');
    }
}
