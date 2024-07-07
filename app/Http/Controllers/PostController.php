<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return response()->json($data, 200);
    }

    public function show(Post $post)
    {
        // $data = Post::find($id);
        if(is_null($post)){
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }
        
        return response()->json($post, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $response = Post::create($data);

        return response()->json($response, 201);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 200);
    }
}
