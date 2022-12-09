<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Stars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    // Cette function est a utiliser lorsque l'user creer le post et donne pour la première fois des etoiles ou bien lorsq'un utilisateur vote pour la première fois
    public function store(Request $request)
    {

        // vérifiaction si le post_id existe
        $post=Post::find($request->post_id);
        if ($post==null){
            return ['Post_id'=>$request->post_id,'error'=>"post doesn't exist"];
        }
        else{
           
            $post_id=$request->post_id;
        }

        // $user_id=$request->user_id;  
        $stars=$request->stars;
        $user_id=Auth::user()->id;   
        $save_stars=new Stars;
        $save_stars->post_id=$post_id;
        $save_stars->user_id=$user_id;
        $save_stars->stars=$stars;




     //vérification si un utilisateur a dejà donner des étoiles a ce post 
        $response = Stars::whereIn('user_id', [$user_id])->where('post_id', $post_id)->get();

        if (count($response)==0){
            $save_stars->save();
            // return [0,$save_stars->getOriginal()]; 

             // met à jour le nombre d'étoiles du post lorque l'utilisateur a voté
            $post_id=$request->post_id;
            $post=Post::find($post_id);
            $stars_count=$post->stars_count;
            
            $new_users_count_vote=$post->users_count_vote+1; // ajoute un nouveau utilisateur au compteur
            $new_stars_count=$stars_count + $stars; // ajoute les étoiles emise données par l'utilisateur
            $stars=(int)$new_stars_count/(int)$new_users_count_vote;
           
            
            $post->stars=$stars;
            $post->stars_count=$new_stars_count;
            $post->users_count_vote=$new_users_count_vote;
            $post->save();

            return ['post_id'=>$post_id,'stars'=>$stars,'stars_count'=>$new_stars_count,"users_count_vote"=>$new_users_count_vote];

        }
        else{
            return [1,$response,'error'=>'User has already given stars'];
        }

     
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function show(Stars $stars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function edit(Stars $stars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stars $stars)
    {
        //
    }
}
