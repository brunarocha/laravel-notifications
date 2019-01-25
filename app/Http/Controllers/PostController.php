<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        $posts = $this->post->paginate();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        //$post = $this->post->with('comments.user')->find($id); traz o usuario do comentario
        //$post = $this->post->with(['comments.user', 'user'])->find($id); traz o usuario do comentario e uusario do post
        $post = $this->post->with('comments')->find($id);


        return view('posts.show', compact('post'));
    }
}
