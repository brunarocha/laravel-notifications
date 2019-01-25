<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Notifications\PostCommented;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        //dd($request->all());
        $comment = $request->user()->comments()->create($request->all());
        $autor = $comment->post->user;
        $autor->notify(new PostCommented($comment));

        return redirect()
            ->route('posts.show', $comment->post_id)
            ->withSuccess('Comentário realizado com sucesso!');
    }
}
