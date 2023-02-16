<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
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
    public function index()
    {
        // $posts = Post::with('user:id,name')->select('id', 'content', 'user_id')->orderBy("id", "desc")->get();
        // $posts = Post::with('user')->orderBy("id", "desc")->get();
        $posts = PostResource::collection(Post::all());

        return response()->json([
            'posts' => $posts
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
        $uid = $request->get("uid");
        $user = User::where("uid", $uid)->first();

        $post = Post::create([
            "content" => $content,
            "user_id" => $user->id,
        ]);

        return response()->json(["post" => $post], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id)->user;
        if ($post) {
            return response()->json(
                [
                    'posts' => $post
                ],
                200
            );
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
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
