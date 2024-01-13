<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Mail\CommentPosted;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Mail;

class PostCommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store(BlogPost $post, StoreComment $request)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
        ]);

        // Mail::to($post->user->email)->send(new CommentPosted($comment));
        // event(new CommentPosted($comment));
        // return response()->json(['message' => 'Your comment has been added!'], 201);

        Mail::to($post->user->email)->send(
            new CommentPosted($comment)
        );

        // $request->session()->flash('status', 'The comment was added!');
        return redirect()->back()->withStatus('The comment was added!');
    }
}
