<?php

namespace App\Http\Controllers;

use App\Events\CommentPosted;
use App\Http\Requests\StoreComment;
use App\Http\Resources\CommentResource;
use App\Models\BlogPost;


class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function index(BlogPost $post)
    {
        return CommentResource::collection($post->comments()->with('user')->get());
    }

    public function store(BlogPost $post, StoreComment $request)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
        ]);

        event(new CommentPosted($comment));

        // $request->session()->flash('status', 'The comment was added!');
        return redirect()->back()->withStatus('The comment was added!');
    }
}
