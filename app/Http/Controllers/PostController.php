<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['posts'] = Post::all();
        
        return view('post.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $categories = Category::pluck('category','id');
        //return $id; 
        return view('post.create',[
            'post'=> new Post(),
            'user_id'=>$id,
            'categories'=>$categories]);
            
            // compact('users','categories')
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
       
        if ($request->hasFile('image')) {
            $datos['image'] = $request->file('image')
            ->store('uploads','public');
        }
        if ($request->hasFile('video')) {
            $datos['video'] = $request->file('video')
            ->store('uploads','public');
        }       
        Post::insert($datos);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        

        return view('post.show', ['posts'=>$post,]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $id = auth()->user()->id;
        $user_id = User::where('id','=',$post->users_id)->first()->id;
        $categories = Category::pluck('category','id');
        if ($id == $user_id){
            return view('post.edit', ['post'=>$post,
            'user_id'=>$id,'categories'=>$categories]);
        }
        else {
            return redirect()->route('post.index')->with('mensaje','Este post fue creado por otro usuario');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except(['_token','_method']);

        if ($request->hasfile('image')) {
            $post = Post::findOrfail($id);
            Storage::delete(['public/'. $post->image]);
            $datos['image'] = $request->file('image')->store('uploads','public');
        }
        if ($request->hasfile('video')) {
            $post = Post::findOrfail($id);
            Storage::delete(['public/'. $post->video]);
            $datos['video'] = $request->file('video')->store('uploads','public');
        }
        Post::where('id','=',$id)->update($datos);
        $post = Post::findOrfail($id);
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrfail($post->id);
        $id = auth()->user()->id;
        $us_id = User::where('id','=',$post->users_id)->first()->id;

        if($id == $us_id) {
            Post::destroy($post->id);
            return redirect()->route('post.index');
        }
        else {
            return redirect()->route('post.index')->with('mensaje','Este post fue creado por otro usuario');
        }
    }
    
}
