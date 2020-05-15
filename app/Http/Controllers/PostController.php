<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:2 | max:255',
            'description' => 'required',
            'price' => 'required'
        ]);

        //dd($request);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->price = doubleval($request->price);
        $post->save();

        return redirect('/posts')->with('success', 'Post success create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required | min:2 | max:255',
            'description' => 'required',
            'price' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->price = doubleval($request->get('price'));
        $post->save();

        return redirect('/posts')->with('success', 'Post alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($post);

        $registro = Post::find($id);
        
        if($registro->delete()){
            return redirect('/posts')->with('success', 'Post deletado com sucesso!');
        }
        return redirect('/posts')->with('error', 'Post não deletado!');
    }
}
