<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $email = $request->all();
        $user = User::where('email', $email)->first();

        $is_liked = Like::isLiked($user['id'], $post['id']);
        if (!$is_liked) {
            // まだlikeが押されていなかったらlikeを登録する
            Like::create([
                'user_id' => $user['id'],
                'post_id' => $post['id']
            ]);
            // $is_liked = !$is_liked;
            // $message = "likeを押しました";
        } else {
            return;
            // すでにlikeが押されている
            // $message = "likeはすでに登録されています。";
        }

        // return response()->json(compact('message', 'is_liked'));
        return response()->noContent();
    }

    public function destroy(Request $request, $postId)
    {
        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        $post = Post::findOrFail($postId);

        $is_liked = Like::isLiked($user['id'], $post['id']);
        if ($is_liked) {
            $like = Like::where('post_id', $postId)->where('user_id', $user['id'])->first();
            $like->delete();
            // $message = "likeを削除しました";
            // $is_liked = !$is_liked;
        } else {
            return;
            // $message = "likeはまだ押されていません";
        }

        // return response()->json(compact('message', 'is_liked'));
        return response()->noContent();
    }
}
