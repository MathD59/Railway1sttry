<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * GET ALL TAG
     *
     * @return \Illuminate\Http\Response
     */
    public function gettag()
    {
        $tag=Tag::all();
        return $tag;
    }

    /**
     * POST A NEW TAG
     *
     * @return \Illuminate\Http\Response
     */
    public function postTag(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']]);
        
        $tag=Tag::create(
            [
                'name'=>$request->name,
            ]
            );
        return $tag;
       
    }

    /**
     * PATCH THE TAG BY USING ID 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function puttag(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']]);
     
        $tag=Tag::find($id)->update(
            [
                'name'=>$request->name,
            ]
            );
            return $tag;
    }

    /**
     * DELETE A SINGLE tag
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function deltag($id)
    {
        Tag::where('id',$id)->delete();
        return "done";
    }

    /**
     * GET NAME OF A SINGLE tag
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function onetag(Request $request)
    {   $id=$request->id;
        $tag=Tag::where('id', $id)->get();
        return $tag;
    }

    public function getTagbyName(Request $request)
    {   
        $name=$request->name;
        $response = Tag::where('name', $name)->get();
        if(count($response)==0){
            return 0;
        }else{
        return $response;}
    }

}
