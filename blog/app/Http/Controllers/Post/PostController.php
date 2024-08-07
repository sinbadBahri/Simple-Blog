<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view(view:'posts.index', data:compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view(view:'posts.createPost', data:compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    { 

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
        ]);

        return redirect(to:'/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Only Admin users & the Author allowed 
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        Gate::authorize('update-post', $post);
        return view(view:'posts.edit', data:compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect(to:'/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::findOrFail($id)->delete();
        return redirect(to:'/');
    }

    public function userPosts(string $id)
    {
        $posts = User::find($id)->posts;
        return view(view:'posts.userPosts', data:compact(['posts']));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view(view:'dashboard', data:compact('posts'));
    }

    /**
     * Admin users Only. 
     */
    public function trashedPosts()
    {
        $posts = Post::onlyTrashed()->get();
        return view(view:'posts.trashPosts', data:compact(['posts']));
    }

    /**
     * Admin users Only. 
     */
    public function restoreTrashedPost(string $id): RedirectResponse
    {
        Post::onlyTrashed()->find($id)->restore();
        return redirect(to:'/');
    }

    /**
     * Admin users Only. 
     */
    public function deletePermanentlyPost(string $id): RedirectResponse
    {
        Post::onlyTrashed()->find($id)->forceDelete();
        return redirect(to:'/');
    }

    public function searchPost(Request $request)
    {
        $posts = Post::where('title', 'like', "%".$request->search."%")->paginate(2);
        return view(view:'posts.searchResultPosts', data:compact(['posts']));
    }
}
