<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        // return response()->json(['data' => $post]);
        return PostResource::collection($posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id)->with('writer');
        return new PostResource($post);
    }

}
