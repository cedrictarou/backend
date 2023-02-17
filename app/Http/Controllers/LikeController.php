<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($postId)
    {

        return response()->json(["message" => "liked"]);
    }

    public function destroy($postId)
    {

        return response()->json(["message" => "unliked"]);
    }
}
