<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

     
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $posts = Post::all();
    return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('posts.create');
}


/**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:1024'
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->user_id = auth()->id();

    if ($request->hasFile('image')) {
        $post->image_path = $request->file('image')->store('images', 'public');
    }

    $post->save();
    return redirect()->route('posts.index');
}




    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
