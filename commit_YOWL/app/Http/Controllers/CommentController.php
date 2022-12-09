<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=$request->id;
        $comments=Comment::all()->where('post_id',$id);
        return $comments;
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
        $comment = new Comment();
        $comment->content=$request->content;
        $content=$request->content;
        $comment -> post_id = $request -> post_id;
        $post_id=$request->post_id;
        $comment -> user_id=Auth::user()->id;
        //  $comment -> user_id=$request->user_id;
       
        
        // vérification si le post existe afin d'enregistrer le commenataire
        $response = Post::where('id', $post_id)->first();  
        if ($response==null){
            return ["code"=>"0","Post_id:"=> $post_id,'error'=>'post not found']; // si le post n'existe retourne le post du id
        }
        else{     

            $response = Comment::where('content', $content)->first();
            if ($response!=null){
                return [1,$response,'error'=>'comment already exist'];
            }
            else{
                $comment -> save();
                return [0,$comment->getOriginal()];
            }
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $comment=Comment::find($id);
        $user_name=$comment->user->name;
        // return $user_name;
        $comment->user_name = $user_name; // insertion du user_name dans le $comment
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        if ($request!=null){

            try {
               
                
                $post_id=$request->post_id;

               
                
                 // vérification si le post existe afin d'enregistrer le commenataire
                $response = Post::where('id', $post_id)->first();  
                if ($response==null){
                    return ["code"=>"0","Post_id:"=> $post_id,'error'=>'post not found']; // si le post n'existe retourne le post du id
                }
                else{ //vérification si le commentaire existe
                    $comment_id=$request->id;
                    $comment=Comment::find((int)$comment_id);
                    if ($comment==null){
                        return [0,'error'=>"comment not found"];
                    }
                    else{
                        $comment->content=$request->content;
                        $comment -> post_id = $request -> post_id;
                        // $comment -> user_id=Auth::user()->id;
                        $comment -> user_id=$request->user_id; 
                        
                        $comment -> save();
                        return [1,$comment->getOriginal()];
                    }
                }
                
            } catch (\Error $e) {
                return ('Error on update comment: '+ $e);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      
        try { $id=$request->id;
            $comment = Comment::find((int) $id);
            
            if ($comment!=null){
               $response=$comment->delete();
               return $response; // return 1 si le comment a été effacé;
            }
            else{
                return [0 ,'error'=>'comment not found'];
            }
            
      } catch (\Error $e) {

          return('Error on delete comment: '+ $e);
          
      }
    }


    public function getLastComments(){

        // permet d'obtenir les 3 derniers commentaires.
        $threeLatest = Comment::orderBy('created_at', 'desc')->take(3)->get();
        return $threeLatest;

    }
    

    public function mostPopularPosts(){

            $mostPopularPosts =Comment::select('post_id') // recupere les 3 éléments les plus nombreux dans la colone post_id.
            ->groupBy('post_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(3)
            ->get();
            $response=[];
            foreach($mostPopularPosts as $item){
                    
                $post_id=$item->post_id; 
                $post=Post::find($post_id);
                $response[]=$post;
            }
             return $response;   
       
        
    }
}
