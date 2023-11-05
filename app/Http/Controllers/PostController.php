<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
//use http\Env\Response;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){

//        dd(Gate::allows('admin'));

        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString(),

        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
           'post' => $post
        ]);
    }



}
