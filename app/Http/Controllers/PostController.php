<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cache;

class PostController extends Controller
{
    public function user_panel_index()
    {
        $posts = Post::with('user')->where('user_id', Auth::user()->id)->get();
        return view('posts.view', compact('posts'));
    }

    public function admin_panel_index()
    {
        $posts = Post::with('user')->get();
        return view('posts.view', compact('posts'));
    }

    public function index()
    {
        //$posts = Post::with('comments')->get();
        $posts = Cache::remember("posts", 60, function () {
            return Post::with('comments')->get();
        });
        return view('posts', compact('posts'));
    }

    public function show($id)
    {
        //$post = Post::with('comments')->find($id);
        $post = Cache::remember("post_{$id}", 60, function () use ($id) {
            return Post::with('comments')->find($id);
        });
        return view('post_details', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);

        Post::create($request->all());
        Cache::forget("posts");
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.posts.panel');
        }
        return redirect()->route('user.posts.panel');
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();

        Cache::forget("post_{$request->id}");

        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.posts.panel');
        }
        return redirect()->route('user.posts.panel');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Cache::forget("posts");

        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.posts.panel');
        }
        return redirect()->route('user.posts.panel');
    }
}
