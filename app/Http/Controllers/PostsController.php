<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $posts = [
        1 => [
            'title' => 'Introduction to laravel.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'is_new' => true,
            'has_comments' => true,
        ],
        2 => [
            'title' => 'Amet consectetur, adipisicing elit.',
            'content' => 'Doloremque in repudiandae hic optio laudantium magnam labore architecto tenetur aliquam nulla.',
            'is_new' => false
        ],
        3 => [
            'title' => 'Dolor sit amet consectetur.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'is_new' => true,
            'has_comments' => true,
        ],
        4 => [
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'content' => 'Quas cumque doloremque in repudiandae hic optio laudantium magnam labore architecto tenetur aliquam nulla.',
            'is_new' => false
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::all()]);
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
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // abort_if(!isset($this->posts[$id]), 404);
        return view('posts.show', ['posts' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
