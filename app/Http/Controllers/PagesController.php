<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('welcome',compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(!empty($post)){
            return view('pages.show',compact('post'));
        }else{
            return redirect('/')->with('error','Post not available');
        }
    }
}
