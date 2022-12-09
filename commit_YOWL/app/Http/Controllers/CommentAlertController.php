<?php

namespace App\Http\Controllers;

use App\Models\CommentAlert;
use Illuminate\Http\Request;

class CommentAlertController extends Controller
{
    /**
     * GET ALL COMMENT ALERT
     *
     * @return \Illuminate\Http\Response
     */
    public function getalcom()
    {
        $alert=CommentAlert::all();
        return $alert;
    }

    /**
     * POST A NEW COMMENT ALERT
     *
     * @return \Illuminate\Http\Response
     */
    public function postalcom(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']]);
        
        $alert=CommentAlert::create(
            [
                'comment_id'=>$request->comment_id,
                'user_id'=>$request->user_id,
            ]
            );
        return $alert;
    }

    /**
     * GET CONTENT OF SINGLE COM ALERT
     *
     * @param  \App\Models\CommentAlert  $category
     * @return \Illuminate\Http\Response
     */
    public function onealcom($id)
    {
        $alert=CommentAlert::where($id);
        return $alert;
    }

}
