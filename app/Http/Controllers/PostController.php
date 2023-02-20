<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = 'yamada@email.com';
        $user = User::where('email', $email)->first();
        $current_user_id = $user['id'];
        $posts = PostResource::collection(Post::all(), $current_user_id);

        // $posts = Post::with(['likes' => function ($query) use ($current_user_id) {
        //     $query->where('user_id', $current_user_id)->exists();
        // }])->get();

        return response()->json([
            'user' => $user,
            'posts' => $posts,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->get("content");
        $email = $request->get("email");
        $user = User::where("email", $email)->first();

        $post = Post::create([
            "content" => $content,
            "user_id" => $user['id'],
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
