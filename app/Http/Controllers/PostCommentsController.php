<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Post;
//use Illuminate\Http\Request;
//
//class PostCommentsController extends Controller
//{
//    //
//    public function store(Post $post){
//
//        request()->validate([
//            'body' => 'required'
//        ]);
//
//
//        $post->comments()->create([
//            'user_id' => request()->user()->id,
//            'body' => request('body')
//        ]);
//
//
//
//
//        return back();
//    }
//}


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // Validate the request data
        $data = request()->validate([
            'body' => 'required'
        ]);

        // Create the comment using the relationship with the post
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $data['body']
        ]);

        return back();
    }
}
//public function store(Request $request, Post $post)
//{
//    // Validate the request data
//    $data = $request->validate([
//        'body' => 'required'
//    ]);
//
//    // Create the comment using the relationship with the post
//    $comment = $post->comments()->create([
//        'user_id' => auth()->id(),
//        'body' => $data['body']
//    ]);
//
//    // Optionally, you can return a response indicating success or redirect
//    return back()->with('success', 'Comment added successfully.');
//}
