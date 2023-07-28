<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'view_counts',
        'new_post',
        'highlight_post',
        'slug',
        'user_id',
        'category_id'
    ];

    protected $hidden = [];

    // 1 Post chỉ thuộc về duy nhất 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1 Post chỉ thuộc về duy nhất 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 Post có thể có nhiều Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Trả về đường dẫn hình ảnh
    public function imageUrl()
    {
        return '/image/post/' . $this->image;
    }
}
