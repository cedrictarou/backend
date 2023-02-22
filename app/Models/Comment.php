<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];
    public static $rules = [
        'comment' => 'required|max:120',
        'user_id' => 'required',
        'post_id' => 'required',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
