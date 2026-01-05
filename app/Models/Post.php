<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'body'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes')->withTimestamps();
    }
}
