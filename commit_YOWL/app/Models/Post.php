<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostAlert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'url',
        // 'tag1_id',
        // 'tag2_id',
        // 'tag3_id',
        'likes_count',
        'stars',
        'stars_count',
        'users_count_vote',
        'alert_post_count',
        'action',
        'image_icon'


     ];

     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function user(){
        return $this->belongsTo(User::class);
     }

     public function comments(){
        return $this->hasMany(Comment::class);
     }

     public function tags()
     {
         return $this->belongsToMany(Tag::class);
     }

     public function postAlerts(){
        return $this->hasMany(PostAlert::class);
     }
   

}
