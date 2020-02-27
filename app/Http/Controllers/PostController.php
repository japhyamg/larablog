<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'coverimage' => ['required','image']
        ]);

        $slug = generate_slug($validatedData['title']);

        $coverimagePath = request('coverimage')->store('coverimages', 'public');

        // dd(public_path("storage/{$coverimagePath}"));

        $image = Image::make(public_path("/storage/{$coverimagePath}"))->resize(270, 200);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'description' => $validatedData['description'],
            'coverimage' => $coverimagePath
        ]);
        return redirect('/posts')->with('success','Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
            return view('posts.edit', compact('post'));
        }else{
            return redirect('/posts')->with('error','Select a post');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($post){
            $validatedData = $request->validate([
                'title' => ['required', 'max:255'],
                'description' => ['required']
            ]);
    
            $coverimagePath = null;
    
            if(request('coverimage')){
                // delete previous cover image
                $coverimagePath = request('coverimage')->store('coverimages', 'public');
        
                $image = Image::make(public_path("/storage/{$coverimagePath}"))->resize(270, 200);
                $image->save();
            }
    
            $slug = generate_slug($validatedData['title']);
    
            $post->update([
                'title' => $validatedData['title'],
                'slug' => $slug,
                'description' => $validatedData['description'],
                'coverimage' => $coverimagePath ? $coverimagePath : $post->coverimage
            ]);
            return redirect('/posts')->with('success','Post Updated');
        }else{
            return redirect('/posts')->with('error','Select a post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
        }else{
            return redirect('/posts')->with('error','Select a post');
        }
    }
}
