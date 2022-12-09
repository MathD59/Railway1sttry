<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StarsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostAlertController;
use App\Http\Controllers\CommentAlertController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('app');
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/retorno', function () {
    return view('dashboard');
  });

  


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/addpost', function () {
        return view('app');});
    Route::post('/user_delete', [ProfileController::class, 'delete_user'])->name('user_delete');

});


 


Route::prefix('api')->group(function(){

    Route::get('whoami',[ProfileController::class, 'whoAmI']);
    Route::get('getposts',[PostController::class, 'index']);
    Route::get('getpost',[PostController::class, 'show']);
    Route::get('getbestpost',[PostController::class, 'getBestPost']); //recupere les 3 mieux notés commentaires
    // Route::get('mostpopularpost',[PostController::class, 'mostPopularPost']); //recupere les 3 mieux notés commentaires
    Route::get('getlastposts',[PostController::class, 'getLastPosts']);
    
    Route::get('gettagbyname', [TagController::class, 'getTagbyName']);

    Route::get('getcomments',[CommentController::class, 'index']);
    Route::get('getcomment',[CommentController::class, 'show']);
    Route::get('getlastcomments',[CommentController::class, 'getLastComments']); //recupere les 3 derniers commentaires
    Route::get('mostpopularposts',[PostController::class, 'getMostCommentedPosts']); //recupere les 3 posts les plus commentés
    
    // routes pour KPI

    Route::get('getdatakpi',[KpiController::class, 'getdatakpi']); //recupere le nombre d'users inscrits
    Route::get('getdataperday',[KpiController::class, 'getdataperday']); 
    Route::get('getcountcommentsbyuser',[PostController::class, 'getCountCommentsByUser']); //recupere le nombre de commentaires d'un utilisateur (il faut passer son id)
   
    


    // Route::post('createpostalert',[PostAlertController::class, 'store']);
    Route::get('getpostsalerts',[PostAlertController::class, 'index']);
    Route::get('getpostalert',[PostAlertController::class, 'show']);
    Route::delete('deletepostalert',[PostAlertController::class, 'destroy']);

    Route::get('getlikes',[LikeController::class, 'index']);
   
    Route::post('storestars',[StarsController::class, 'store']);



    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category/{id}', [CategoryController::class, 'onecat']);


    Route::get('tags', [TagController::class, 'gettag']);
    Route::get('tag', [TagController::class, 'onetag']);
    Route::post('createtag', [TagController::class, 'posttag']);
    Route::post('createposttag', [PostTagController::class, 'store']);
    Route::post('getpoststag', [PostTagController::class, 'index']);
    Route::get('getposttag', [PostTagController::class, 'show']);


    Route::post('updatestars',[PostController::class, 'updateStars']);
  
   
    Route::group(['middleware' => 'admin'], function () {
        // Route::post('createpost',[PostController::class, 'store']);
        
        Route::get('/dashboard_admin', function () {
            return view('dashboard_admin');
        })->middleware(['auth', 'verified'])->name('dashboard_admin');



    });
    
    Route::group(['middleware' => 'auth'], function () {
        Route::put('updatepost',[PostController::class, 'update']);
        Route::post('createpost',[PostController::class, 'store']);
       Route::post('createpostalert',[PostAlertController::class, 'store']);
    });

       Route::delete('deletepost',[PostController::class, 'destroy']);

       Route::post('createcomment',[CommentController::class, 'store']);
       Route::put('updatecomment',[CommentController::class, 'update']);
       Route::delete('deletecomment',[CommentController::class, 'destroy']);
       
    });
    




// Routes liées à l'API (CRUDS)

Route::middleware('auth')->prefix('api')->group(function(){
    Route::prefix('api')->post('categories', [CategoryController::class, 'postcat']);
    Route::prefix('api')->put('categories/{id}', [CategoryController::class, 'putcat']);
    Route::prefix('api')->delete('categories/{id}', [CategoryController::class, 'delcat']);
    Route::prefix('api')->post('tags', [TagController::class, 'posttag']);
    Route::prefix('api')->put('tags/{id}', [TagController::class, 'puttag']);
    Route::prefix('api')->delete('tags/{id}', [TagController::class, 'deltag']);
    Route::prefix('api')->get('alertcomment', [CommentAlertController::class, 'getalcom']);
    Route::prefix('api')->post('alertcomment', [CommentAlertController::class, 'postalcom']);
    Route::prefix('api')->get('alertcomment/{id}', [CommentAlertController::class, 'onealcom']);

});
// Routes liées à l'API GUEST

Route::prefix('api')->get('categories', [CategoryController::class, 'index']);
Route::prefix('api')->get('category/{id}', [CategoryController::class, 'onecat']);
Route::prefix('api')->get('tags', [TagController::class, 'gettag']);
Route::prefix('api')->get('tag/{id}', [TagController::class, 'onetag']);
Route::prefix('api')->post('fposts', [PostController::class, 'filtPost']);
Route::prefix('api')->post('sposts', [PostController::class, 'searchLike']);

Route::get('/', function () {
    return view('app');
});

Route::get('/allposts/', function () {
    return view('app');
});

Route::get('/post/{any}', function () {
    return view('app');
})->where('any', '.*');



    
require __DIR__.'/auth.php';

