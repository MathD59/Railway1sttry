<?php

namespace App\Http\Controllers;

use App\Models\Post_Tag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts_tags=Post_Tag::all();
        return $posts_tags;

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
        $tag_id= $request -> tag_id;
        $post_id=$request -> post_id;

     
        $response = Post_Tag::whereIn('tag_id', [$tag_id])->where('post_id', $post_id)->get();

        if (count($response)==0){ // si ce post_tag n'existe pas il est enregistré dans la bas de données.
            $post_tag=new Post_Tag;
            $post_tag -> tag_id = $request -> tag_id;
            $post_tag -> post_id = $request -> post_id;
            $post_tag->save();

            return  [0,$post_tag->getOriginal()];
        
        }
    
        else{
            return [$response,'error'=>'Post_tag exists'];
        }



        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_Tag  $post_Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {
        $post_tag_id=$request->id;
        $post_tag=Post_tag::find($post_tag_id);
        if ($post_tag==''){
            return 0;
        }
        else{
            return $post_tag;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_Tag  $post_Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_Tag $post_Tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post_Tag  $post_Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_Tag $post_Tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_Tag  $post_Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_Tag $post_Tag)
    {
        //
    }
}
