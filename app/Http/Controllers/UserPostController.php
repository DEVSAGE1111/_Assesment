<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Models\MediaLibrary;
use App\Models\Post;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserPostController extends Controller
{
    /**
     * Show the application posts index.
     */
    public function index(): View
    {
        dd(auth()->user()->id);
        $posts=Post::where('author_id',auth()->user()->id)->withCount('comments', 'likes')->with('author')->get();
        return view('contributor.posts.index', [
            'posts' =>$posts
        ]);
    }

    public function show(){

    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post): View
    {
        return view('contributor.posts.edit', [
            'post' => $post,
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('contributor.posts.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        $post = Post::create($request->only(['title', 'content', 'posted_at', 'author_id', 'thumbnail_id']));

        return redirect()->route('userposts.edit', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->only(['title', 'content', 'posted_at', 'author_id', 'thumbnail_id']));

        return redirect()->route('posts.edit', $post)->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->withSuccess(__('posts.deleted'));
    }
}
