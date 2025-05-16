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
        $validatedData = $request->validate([
                                    'nameofauthor' => 'required|string|max:30',
                                    'profile'=> 'nullable|url|max:255',
                                    'title' => 'required|string|max:50',
                                    'content' => 'required|string',
        ]);
        if(empty($validatedData['profile'])){
             $validatedData['profile'] = 'https://ui-avatars.com/api/?name=User&background=0D8ABC&color=fff';
        }

        Post::create($validatedData);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
                                    'nameofauthor' => 'required|string|max:30',
                                    'profile'=> 'nullable|url|max:255',
                                    'title' => 'required|string|max:50',
                                    'content' => 'required|string',
        ]);
        if(empty($validatedData['profile'])){
             $validatedData['profile'] = 'https://ui-avatars.com/api/?name=User&background=0D8ABC&color=fff';
        }

        $post->update($validatedData);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function likepost(Post $post)
    {
       
        $post->increment('like');
        return redirect()->route('posts.index')->with('success', 'Post liked successfully.');
    }
}
