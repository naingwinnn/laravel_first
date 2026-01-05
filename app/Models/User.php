<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profile()
    {
        return $this->hasOne(Profile::class); 
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes')->withTimestamps();
    }

    public function latestCommentThroughPost()
    {
        return $this->hasOneThrough(
            Comment::class,
            Post::class,
            'user_id', 
            'post_id',
            'id', 
            'id' 
        )->latestOfMany();
    }

    public function commentsThroughPosts()
    {
        return $this->hasManyThrough(
            Comment::class,
            Post::class,
            'user_id', 
            'post_id', 
            'id',      
            'id'      
        );
    }
}
