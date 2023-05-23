<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $colors = [
        'red' => 'Red color',
        'yellow' => 'Yellow color',
        'green' => 'Green color',
        'blue' => 'Blue color',
        'gray' => 'Gray color',
        'indigo' => 'Indigo color',
        'purple' => 'Purple color',
        'pink' => 'Pink color',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.tags.create')->with('colors', $this->colors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',
        ]);

        $tag = Tag::create( $request->all() );

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info','The tag has been successfully created');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'))->with('colors', $this->colors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);

        $tag->update( $request->all() );
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info','The tag has been successfully updated')->with('colors', $this->colors);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','The tag has been successfully deleted');
    }
}
