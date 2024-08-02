<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use \Cache;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->get();
        return view('comments.view', compact('comments'));
    }

    public function commentByuser()
    {
        $comments = Comment::with('post')->where('user_id', Auth::user()->id)->get();
        return view('comments.view', compact('comments'));
    }
    
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        $post->comments()->create($request->all());
        Cache::forget("post_{$request->post_id}");
        return back();
    }

    public function destroy($id)
    {
        $post = Comment::find($id);
        $post->delete();

        if(Auth::user()->role == 'admin'){
        return redirect()->route('admin.comments.index');
        }
        return redirect()->route('user.comments.index');
    }
}
