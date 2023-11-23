<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json(['data' => $comments]);
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json(['data' => $comment]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id'),
        ]);

        return response()->json(['data' => $comment], 201);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $this->validate($request, [
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return response()->json(['data' => $comment]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
