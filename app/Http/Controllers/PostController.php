<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact(['posts']));
    }
    
    public function add()
    {	
        return view('posts.add');
    }

    public function create(Request $request)
    {
        // mass assignment
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]); 
        // dd($post->all());
        
        return redirect()->route('post.index')->with('sukses','Data berhasil di input');
    }

    public function edit(Post $post)
    {
        return view('posts/edit',['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $post->update($request->all());

        return redirect()->route('post.index')->with('sukses','Data berhasil di update');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('sukses','Data berhasil di delete');
    }
}
