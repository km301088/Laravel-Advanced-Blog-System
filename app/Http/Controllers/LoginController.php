<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('index'); // Create a view for the admin dashboard
    }

    public function login_via_api(Request $request){

        if(!empty(Auth::guard('web')->check())){
            return redirect()->back();
        }
        else{

        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
            ]);
            
            if(!$validator->fails()){
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                    // if successful, then redirect to their intended location
                    // return redirect()->intended(route('user.dashboard'));
                    // $user = Auth::user();
                    $user = User::where('email' , $request->email)->first();
                    $success['token'] = $user->createToken('laravel_blog')->plainTextToken;
                    $success['name'] = $user->name;
                    $success['email '] = $user->email;
                    $success['role'] = $user->role;
                    
                    return response()->json([
                        'Auth' => 'Login Successful!',
                        'data' => $success,
                        'error' => 'false',
                        'status' => '200'
                    ]);

            }else{
                $errors['email'] = 'This email is not register with us';
                $errors['password'] = 'This password is not register with us';
                return response()->json([
                        'Auth' => $errors,
                        'error' => 'true',
                        'status' => '400'
                    ]);
            }
        }else{
            return response()->json(['status' => false, 'Auth' => array( $validator->errors() ) ],400);
        }
      }

    }

    public function get_post_via_api(){

        $post = Post::with('comments')->get();
        return response()->json([
            'data' => $post,
            'error' => 'false',
            'status' => '200'
        ]);

    }

    public function authenticate_user()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('user.dashboard');
        }
    }

    public function login()
    {
        return view('login'); // Create a view for the admin dashboard
    }

    public function User_Dashboard()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get()->count();
        $comment = Comment::where('user_id', Auth::user()->id)->get()->count();
        return view('user.index', compact('posts','comment'));
    }

    public function Admin_Dashboard()
    {
        $posts = Post::all()->count();
        $comment = Comment::all()->count();
        $user = User::all()->count();
        // dd($posts,$comment);
        return view('admin.dashboard', compact('posts','comment','user'));
    }
}
