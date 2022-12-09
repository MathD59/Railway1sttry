<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\PostAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $array=[];
        $record=PostAlert::all();
        foreach($record as $item){
           $user_id= $item->user_id;
           $user=User::find($user_id);
           $user_name=$user->name;
           $item->user_name=$user_name;
           $array[]=$item;
        }
        return $array;
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
        $post_id=$request->post_id;
        $user_id=$request->user_id;

        $post_alert = new PostAlert();
        
        $post_alert->post_id=$request->post_id;
        $post_alert -> user_id=Auth::user()->id;
        // $post_alert -> user_id=$request->user_id;
        $user_id=Auth::user()->id;
       
        $result = PostAlert::where('post_id', $post_id)
        ->where('user_id', $user_id)
        ->get();
        if(count($result)==0){
            // enregistrement de l'alert dans la table
            $post_alert -> save();
            //enregistrement de l'alert dans la colone alert_post_count.
            $post=Post::find($post_id);
            $alert_post_count=$post->alert_post_count;
            $new_count=$alert_post_count+1;
            $post->alert_post_count=$new_count;
            $post->save();
            return [0,$post_alert->getOriginal()];

        }else{
            return [1,$result,'error'=>'user has reported this post yet'];
        }

        } 





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostAlert  $postAlert
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $post_alert_id=$request->id;
        $alert=PostAlert::find($post_alert_id);
        if($alert==null){
            return [0,'error'=>'unfound post alert with id '.$alert];
        }else{
            $user_id= $alert->user_id;
            $user=User::find($user_id);
            $alert->user_name=$user->name;
            return $alert;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostAlert  $postAlert
     * @return \Illuminate\Http\Response
     */
    public function edit(PostAlert $postAlert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostAlert  $postAlert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostAlert $postAlert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostAlert  $postAlert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        try { $id=$request->id;
            $post_alert = PostAlert::find((int) $id);
            $post_id=$post_alert->post_id;
        
            if ($post_alert!=null){
              
                //delete l'alert de la table
               $response=$post_alert->delete();
                // diminue de un le compteur des alerts de la table post
               $post=Post::find($post_id);
               $alert_post_count=$post->alert_post_count;
               $new_count=$alert_post_count-1;
               $post->alert_post_count=$new_count;
               $post->save();

               return $response; // return 1 si le alert a été effacer;
            }
            else{
                return 0;
            }
            
      } catch (\Error $e) {

          return('Error on delete post: '+ $e);
          
      }
    }
}
