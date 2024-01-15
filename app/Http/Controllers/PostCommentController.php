<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Jobs\NotifyUsersPostWasCommented;
use App\Mail\CommentPosted;
use App\Mail\CommentPostedMarkdown;
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


        // Mail::to($post->user->email)
        //     ->cc('aadhargaur41@gmail.com')
        //     ->bcc('aadhar41@gmail.com')
        //     ->queue(new CommentPostedMarkdown($comment));


        $when = now()->addMinutes(1);
        Mail::to($post->user->email)->later(
            $when,
            new CommentPostedMarkdown($comment)
        );

        NotifyUsersPostWasCommented::dispatch($comment);

        // Mail::to($post->user->email)->queue(
        //     new CommentPostedMarkdown($comment)
        // );

        // $request->session()->flash('status', 'The comment was added!');
        return redirect()->back()->withStatus('The comment was added!');
    }
}