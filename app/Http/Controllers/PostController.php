<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        // return auth()->user()->getPermissionsViaRoles();
        // auth()->user()->givePermissionTo('edit post');
        $post = Post::get()->toArray();
        // echo "<pre>";
        // print_r($post);
        // die;
        return view('post')->with(compact('post'));
    }


    public function create()
    {
        $posttitle = "Create";
        return view('post-create-edit')->with(compact('posttitle'));
    }

    // Save post
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;

            $post = new Post;
            $post->title = $data['title'];
            $post->body = $data['body'];
            $post->save();

            return redirect('post');
        }
    }

    //  Edit Post
    public function edit(Request $request, $post)
    {
        $posttitle = "Edit";
        $posts = Post::find($post);
        // echo "<pre>";
        // print_r($posts);
        // die;
        if ($request->isMethod('post')) {
            $data = $request->all();

            // echo "<pre>";
            // print_r($data);
            // die;
            Post::where('id', $post)->update(['title' => $data['title'], 'body' => $data['body']]);

            return redirect('post');
        }


        return view('post-create-edit')->with(compact('posttitle', 'posts'));
    }

    public function view($posts)
    {
        $post = Post::where('id', $posts)->get()->toArray();
        // echo "<pre>";
        // print_r($post);
        // die;
        return view('post-view')->with(compact('post'));
    }

    public function publish()
    {
        $message = "Post publish successfully";
        Session::flash('success_message', $message);
        return redirect()->back();
    }
}
