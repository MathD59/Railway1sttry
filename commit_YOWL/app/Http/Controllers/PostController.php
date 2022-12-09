<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        //  return $request;

        $post = new Post();
        $post -> title = $request -> title;
        // $post->user_id=$request->user_id;
        $post -> user_id=Auth::user()->id;
        $post -> category_id = $request -> category_id;
        $post -> url = $request -> url;
        $post -> image_icon = $request ->image_icon;
        $post->stars_count=$request->stars_count;
        $post->stars=$request->stars_count;// c'est sont les étoiles données par le créateur du post
        $post->users_count_vote=1;
        $url=$request -> url;

        $response = Post::where('url', $url)->first();
        if ($response!=null){
            return [1,$response,'error'=>'post already exist'];
        }
        else{
            $post -> save();
            return [0,$post->getOriginal()];
        }

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)


    {
        $post=Post::find($request->post_id);
        if ($post==null){
            return ['Post_id'=>$request->post_id,'error'=>"post doesn't exist"];
        }
        else{
            
            $user_name=$post->user->name;
            $category_id= $post->category_id;
            $category_name=Category::find($category_id)->name;
            $post->user_name = $user_name; // insertion du user_name dans le $comment
            $post->category_name = $category_name; 
            return  $post;
        }
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        if ($request!=null){

            try {
                $post_id=$request->id;
                $post=Post::findOrFail($post_id);
                $post->title=$request->title;
                $post->category_id=$request->category_id;
                $post->url=$request->url;
                $post->image_icon=$request->image_icon;
                $post->action=$request->action;
                $post->save();
                return $post->getOriginal();
            } catch (\Error $e) {
                return ('Error on update post: '+ $e);
            }
        }
     
         
    }

    // public function updateStars(Request $request)
    // {
    //     // met à jour le nombre d'étoiles d'un post lorqu'un utilisateur vote
    //     $post_id=$request->id;
    //     $post=Post::findOrFail($post_id);
    //     $stars_count=$post->stars_count;
    //     $new_users_count_vote=$post->users_count_vote+1; // ajoute un nouveau utilisateur au compteur
    //     $new_stars_count=$stars_count+ $request->stars; // ajoute les étoiles emise données l'utilisateur
    //     $stars=(int)$new_stars_count/(int)$new_users_count_vote;
        
    //     $post->stars=$stars;
    //     $post->stars_count=$new_stars_count;
    //     $post->users_count_vote=$new_users_count_vote;
    //     $post->save();

    //     return ['stars'=>$stars,'stars_count'=>$new_stars_count,"users_count_vote"=>$new_users_count_vote];


    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)

    {
        // return  Post::find($request->id);

        try { $id=$request->id;
              $post = Post::find((int) $id);
              
              if ($post!=null){
                 $response=$post->delete();
                 return $response; // return 1 si le post a été effacer;
              }
              
        } catch (\Error $e) {

            return('Error on delete post: '+ $e);
            
        }

    }

    public function sortPost(){        
        
        $posts= Post::all();
        return $posts; 
    }

    public function getBestPost(){

        // permet d'obtenir les 3 posts les plus aimés.
        $threeLatest = Post::orderBy('stars', 'desc')->take(3)->get();
        return $threeLatest;

    }

    public function getLastPosts(){

        // permet d'obtenir les 3 derniers posts.
        $threeLatest = Post::orderBy('created_at', 'desc')->take(3)->get();
        return $threeLatest;

    }

    public function getCountCommentsByPost(Request $request){
        $post_id=$request->post_id;
        $count = Comment::where('post_id', $post_id)->count();
        return $count;
    }

    public function getMostCommentedPosts(){

        // permet d'obtenir les 3 posts les plus commentés.
        $posts = Post::withCount('comments')->get();
        $posts = $posts->sortByDesc('comments_count');
        $threecommented = $posts->slice(0, 3);

        return $threecommented;
    }

    public function getCountCommentsByUser(Request $request){
        $user_id=$request->user_id;
        $count = Post::where('user_id', $user_id)->count();
        return $count;
    }



    public function filtPost (Request $request){
        $thisarray=$request->categories;
        $thisarray=explode(",",$thisarray);
        

        $starselec=$request->starselec;
        $query=Post::query();

        if ($thisarray==['']){
            
        }
        else{
                $query=$query->whereIn('category_id',$thisarray) ;
        }

        if ($starselec){
           $query=$query->where('stars','>=',$starselec);
        }
        
        $query=$query->get();

        return $query;
        }


    public function searchLike (Request $request){
        
        $search = $request->searcharea ;
        $posts = Post::query();

        $posts=$posts->where("title","LIKE","%{$search}%");
        $posts=$posts->get();
        
        return $posts;

    }

}


