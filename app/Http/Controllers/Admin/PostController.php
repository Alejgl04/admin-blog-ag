<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create( $request->all() );

        if ($request->file('file')) {
            $urlImage = Storage::put('posts', $request->file('file'));
            $post->image()->create([
                'url' => $urlImage,
            ]);
        }
        if ( $request->tags ) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update( $request->all() );

        if ( $request->file('file') ){
            $urlImage = Storage::put('posts', $request->file('file'));

            if ( $post->image ) {
                Storage::delete( $post->image->url );

                $post->image->update([
                    'url' => $urlImage
                ]);
            }
            else {
                $post->image()->create([
                    'url' => $urlImage
                ]);
            }
        }

        if ( $request->tags ) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post)->with('info',"The post: $post->name has been successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index', $post)->with('info',"The post: $post->name has been successfully deleted");
    }
}
