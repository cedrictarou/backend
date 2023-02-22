<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json(compact('comments'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Comment::create($data);

        return response()->noContent();
    }
}
