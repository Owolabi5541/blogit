<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Basic routing

//Route::post('newsletter', function(Newsletter $newsletter) {
//    request()->validate([
//        'email' => 'required|email'
//    ]);
//    try{
//        $newsletter->subscribe(request('email'));
//
//    } catch(\Exception $e) {
//        throw \Illuminate\Validation\validationException::withMessages([
//            'email' => 'This email could not be added to our newsletter'
//        ]);
//    }
//    return redirect('/')->with('success', 'You are now signed up for our newsletter!');
//
//});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//Route::post('/posts/{post:slug}/comments', function(){
//    request()->validate([
//        'body' => 'required'
//    ]);
//
//
//    $post = new Post;
//
//    $post->comments()->create([
//        'user_id' => request()->user()->id,
//        'body' => request('body')
//    ]);
//
//
//
//
//    return back();
//});

Route::post('/newsletter', NewsletterController::class);


Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');


Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');



//Admin
Route::middleware('can:admin')->group(function(){

    Route::resource('admin/posts', AdminPostController::class)->except('show');

    //cmd->php artisan route:list

//    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
//    Route::post('/admin/posts', [AdminPostController::class, 'store']);
//    Route::get('/admin/posts', [AdminPostController::class, 'index']);
//    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//    Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update']);
//    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy']);

});



