<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            
            // $posts = Auth::check() ? auth()->user()->posts : Post::all();

            /* This is a simple query to get all the posts for a user. */
            $posts = $request->user_id ? User::findOrFail($request->user_id)->posts->sortByDesc('publication_date') : Post::orderBy('publication_date', 'DESC')->get();

        } catch (\Throwable $th) {
            // throw $th
            return collect([
                'throwable' => $th->getMessage()
            ]);
        }

        /* This is a resourceful route that returns a collection of posts. */
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        try {
            /* This is creating a new post and saving it to the database. */
            $post = Post::create($request->validated());
        } catch (\Throwable $th) {
            // throw $th
            return collect([
                'throwable' => $th->getMessage()
            ]);
        }

        /* The above code is creating a new instance of the PostResource class and passing in the post
        object. */
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            /* This code is retrieving a post from the database using the id of the post. If the post
            is not found, the code will throw an exception. */
            $post = Post::where('id', $id)->firstOrFail();
        } catch (\Throwable $th) {
            // throw $th
            $post = collect([
                'throwable' => $th->getMessage()
            ]);
        }

        /* The above code is creating a new PostResource object and passing in the post object. */
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
