<?php

namespace App\Models;


use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostAlert extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id'

     ];

     
     public function posts(){
        return $this->belongsTo(Post::class);
     }

     public function user(){
        return $this->belongsTo(User::class);
     }
}
