<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
    ];

    protected $hidden = [];

    // 1 Comment chỉ thuộc về duy nhất 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 Comment chỉ thuộc về duy nhất 1 Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
