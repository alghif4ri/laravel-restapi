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

    public function show($id)
    {
        $data = Post::find($id);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $response = Post::create($data);

        return response()->json($response, 201);
    }
}
