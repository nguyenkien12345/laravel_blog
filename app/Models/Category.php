<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [];

    // 1 Category có thể có nhiều Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
