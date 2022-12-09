<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * GET ALL CATEGORIES
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        return $category;
    }

    /**
     * POST A NEW CATEGORY
     *
     * @return \Illuminate\Http\Response
     */
    public function postcat(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']]);
        
        $category=Category::create(
            [
                'name'=>$request->name,
            ]
            );
        return $category;
    }

    /**
     * PATCH THE CATEGORY BY USING ID 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function putcat(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']]);
     
        $category=Category::find($id)->update(
            [
                'name'=>$request->name,
            ]
            );
            return $category;
    }

    /**
     * DELETE A SINGLE CATEGORY
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delcat($id)
    {
        Category::where('id',$id)->delete();
        return "done";
    }

    /**
     * GET NAME OF A SINGLE CATEGORY
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function onecat($id)
    {
        $category=Category::where($id);
        return $category;
    }

}
