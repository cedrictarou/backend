<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = CommentResource::collection(Comment::all());

        return response()->json(compact('comments'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $comment = Comment::create($data);

        return new CommentResource($comment);
    }
}
