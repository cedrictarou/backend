<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = [
        'user_id',
        'post_id',
    ];
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    static function isLiked($userId, $postId)
    {
        return Like::where('user_id', $userId)->where('post_id', $postId)->exists();
    }
}
