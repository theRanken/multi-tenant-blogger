<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments')->paginate(10);
        return view('tenants.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $id)
    {
        //
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

    // Additional Features

    public function like_post(Request $request, Post $post){
        $user = $request->user();
        $existing_like = Like::where('user_id', $user->id)
                             ->where('post_id', $post->id)
                             ->first();

        if ($existing_like) {
            $existing_like->delete();
            $liked = false;
        } else {
            Like::create(['user_id' => $user->id,'post_id' => $post->id]);
            $liked = true;
        }

        return back()->withSuccess("");
    }
}
