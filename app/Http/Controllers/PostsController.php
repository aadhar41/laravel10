<?php

namespace App\Http\Controllers;

use App\Contracts\CounterContract;
use App\Events\BlogPostPosted;
use App\Facades\CounterFacade;
use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use App\Models\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'posts.index',
            [
                'posts' => BlogPost::latestWithRelations()->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $post = BlogPost::create($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            $post->image()->save(
                Image::make([
                    'path' => $path
                ]),
            );
        }

        event(new BlogPostPosted($post));

        $request->session()->flash('status', 'The blog post created!');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogPost = Cache::tags(['blog-post'])->remember("blog-post-{$id}", 60, function () use ($id) {
            return BlogPost::with([
                'comments',
                'comments.user',
                'user',
                'tags'
            ])->findOrFail($id);
        });

        return view(
            'posts.show',
            [
                'posts' => $blogPost,
                'counter' => CounterFacade::increment("blog-post-{$id}", ['blog-post'])
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = BlogPost::findOrFail($id);

        // Via Gate
        // $this->authorize('update-post', $post);

        // Via Policies
        // $this->authorize('update', $post);
        $this->authorize($post);

        return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, string $id)
    {
        $post = BlogPost::findOrFail($id);
        // if (Gate::denies('update-post', $post)) {
        //     abort(403, "You are not authorized to update this blog post!");
        // }
        // Via Gates
        // $this->authorize('update-post', $post);

        // Via Policies
        // $this->authorize('update', $post);
        $this->authorize($post);

        $validated = $request->validated();
        $post->fill($validated);
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            if ($post->image) {
                Storage::delete($post->image->path);
                $post->image->path = $path;
                $post->image->save();
            } else {
                $post->image()->save(
                    Image::make([
                        'path' => $path
                    ]),
                );
            }
        }

        $post->save();
        $request->session()->flash('status', 'The blog post updated!');
        return redirect()->route('posts.show', ['post' => $post->id]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        // if (Gate::denies('delete-post', $post)) {
        //     abort(403, "You are not authorized to delete this blog post!");
        // }

        // Via Gates
        // $this->authorize('delete-post', $post);

        // Via Policies
        // $this->authorize('delete', $post);
        $this->authorize($post);

        $post->delete();

        session()->flash('status', 'Blog post deleted!');
        return redirect()->route('posts.index');
    }
}
