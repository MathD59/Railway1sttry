<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\CommentAlert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'content',
        'post_id',
        'action',
        'likes_count',
        'dislikes_count',
        'alerts_comment_count',


     ];

     public function user(){
        return $this->belongsTo(User::class);
     }

     public function post(){
        return $this->belongsTo(Post::class);
     }

     public function commentAlerts(){
        return $this->hasMany(CommentAlert::class);
     }
}
