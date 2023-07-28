<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Comment;
use Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'email_verified_at',
        'device_token',
        'mobile',
        'otp',
        'image'
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($password)
    {
        if (trim($password) === '') return;
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(Notification $notification)
    {
        return $this->mobile;
    }

    /**
     * Route notifications for the Slack channel.
     */
    public function routeNotificationForSlack(Notification $notification)
    {
        return "https://hooks.slack.com/services/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";
    }

    public function checkUserIsOnline()
    {
        return Cache::has('user-is-online-' . $this->user_id);
    }

    // 1 User có thể có nhiều Post
    public function posts()
    {
        // Khóa ngoại post và khóa chính user
        // return $this->hasMany(Post::class, 'user_id', 'id');
        return $this->hasMany(Post::class);
    }

    // 1 User có thể có nhiều Comment
    public function comments()
    {
        // Khóa ngoại comment và khóa chính user
        // return $this->hasMany(Comment::class, 'user_id', 'id');
        return $this->hasMany(Comment::class);
    }
}
