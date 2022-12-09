<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class KpiController extends Controller
{
        /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getdatakpi(Request $request)
    {

        $compteur_age=0;
        $count_users=User::all()->count();
        $users=User::all();
        $comments=Comment::all()->count();
        $posts=Post::all()->count();
        $categorys=Category::all()->count();
        $likes=Like::all()->count();

        foreach($users as $item){
            $user_birth= $item->birth_date;
  
            // Create a new Carbon instance from the date
            $carbon = new Carbon($user_birth);
            // Calculate the difference in years between the date and the current date
            $years = $carbon->diffInYears();
            $compteur_age+=$years;
            // nombre de commenatires de l'utilisateur
  
             
         }
         $moyenne_age=$compteur_age/$count_users;
         $moyenne_commentaires=$comments/$count_users;
         $moyenne_commentaires_par_post=$comments/$posts;
         $moyenne_commentaires_par_category=$comments/$categorys;
         $moyenne_likes_par_post=$likes/$posts;
         $moyenne_likes_par_commentaire=$likes/$comments;
         $array = array(
            'users_count' => $count_users,
            'moyenne_age' => $moyenne_age,
            'moyenne_commentaires_par_utilisateur' => $moyenne_commentaires,
            'moyenne_commentaires_par_post'=>$moyenne_commentaires_par_post,
            'moyenne_commentaires_par_category'=>$moyenne_commentaires_par_category,
            'moyenne_likes_par_post'=>$moyenne_likes_par_post,
            'moyenne_likes_par_commenatire'=>$moyenne_likes_par_commentaire,
        );
        return view('dashboard_admin', $array);
        return $array;

    }

    public function getdataperday(Request $request){

        // format date dans la requete "2022-11-01"
        $date=$request->date;
        $count_posts = Post::whereDate('created_at', $date)->count();
        $count_comments = Comment::whereDate('created_at', $date)->count();
        $count_likes=Like::whereDate('created_at', $date)->count();
        $count_post_alert=PostAlert::whereDate('created_at', $date)->count();
        $count_users=User::whereDate('created_at', $date)->count();
        
        
        $array=array(
            'date'=>$date,
            'users'=>$count_users,
            'posts'=>$count_posts,
            'comments'=>$count_comments,
            'likes'=>$count_likes,
            'Postalert'=>$count_post_alert,

        );
        return $array;


    }
}
