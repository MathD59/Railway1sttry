<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $likes=Like::all();
        return $likes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like = new Like();
        $comment_id=$request->comment_id;
        $like->comment_id=$request->comment_id;
       
        $like -> user_id=Auth::user()->id;
        //  $like -> user_id=$request->user_id;
        //  $user_id=$request->user_id;
            $user_id=Auth::user()->id;
        // return $user_id;
       
        
        // vérification si le comment existe afin d'enregistrer le like
        $response = Comment::where('id', $comment_id)->first(); 
     
        if ($response==null){
            return ["code"=>"0","Comment_id:"=> $comment_id,'error'=>'comment not found']; // si le post n'existe retourne le post du id
        }
        else{     
            // verification si l'utilisateur a dejà liké ce commentaire
            $response2 = Like::where('user_id', $user_id)->where('comment_id', $comment_id)->first();
            if ($response2!=null){
                return [1,$response2,'error'=>'user has liked this post yet'];
            }
            else{
                
                 $like -> save();
               // augmente le nombre de likes du commentaire
                $comment=Comment::find((int)$comment_id);
                $likes_count=$comment->likes_count;
                $sum=(int)$likes_count+1;
                
                $comment->likes_count=$sum;
                $comment->save();

                //permet d'ajouter un like au post du commenatire
                // $post_id=$comment->post_id;
                // $post=Post::find((int)$post_id);
                // $likes_count=$post->likes_count;
                // $sum=(int)$likes_count+1;
                // $post->likes_count=$sum;
                // $post->save();
                return [0,$comment->getOriginal()];
            }
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
   
        // $comment_id = $request->comment_id;
        // $user_id=$request->user_id;
        // $response = Like::whereIn('user_id', [$user_id])->where('comment_id', $comment_id)->get();
        

        $value1 = $request->comment_id;
        $value2 = Auth::user()->id;
        $like = Like::where('comment_id', $value1)
                         ->where('user_id', $value2)
                         ->get();
        if (count($like)==0){
            return ['error'=>"this like doesn't exist on database"];
        }else{
                $like_id= $like[0]->id;
                $like = Like::find((int)$like_id);
                $response=$like->delete();
        // diminuer le nombre de like dans la table comment
        
        $comment=Comment::find((int)$value1);
        $likes_count=$comment->likes_count;
        $sum=(int)$likes_count-1;
        
        $comment->likes_count=$sum;
        $comment->save();


                return $response;
           
            
            
        }
        



    }
}
