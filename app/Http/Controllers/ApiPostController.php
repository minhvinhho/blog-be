<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiPostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class ApiPostController extends Controller
{
    public function getPost() {
        return response()->json(Post::all(), 200);
    }


    public function getPostById($id) {
        $post = Post::find($id);
        if(is_null($post)) {
            return response()->json(['message' => 'Post Not Found'], 404);
        }
        return response()->json($post::find($id), 200);
    }

    public function addPost(ApiPostRequest $request) {
        $post = Post::create($request->all());
        return response($post, 201);
    }

    public function updatePost(ApiPostRequest $request, $id) {
        $post = Post::find($id);
        if(is_null($post)) {
            return response()->json(['message' => 'Post Not Found'], 404);
        }
        $post->update($request->all());
        return response($post, 200);
    }

    public function deletePost(Request $request, $id) {
        $post = Post::find($id);
        if(is_null($post)) {
            return response()->json(['message' => 'Post Not Found'], 404);
        }
        $post->delete();
        return response()->json(null, 204);
    }
}
