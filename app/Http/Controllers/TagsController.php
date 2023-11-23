<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json(['status' => 'success', 'data' => $tags, 'timestamp' => Carbon::now()]);
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['status' => 'error', 'message' => 'Tag not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $tag, 'timestamp' => Carbon::now()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags'
        ]);

        $tag = Tag::create([
            'name' => $request->input('name')
        ]);

        return response()->json(['status' => 'success', 'data' => $tag, 'timestamp' => Carbon::now()], 201);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['status' => 'error', 'message' => 'Tag not found'], 404);
        }

        $this->validate($request, [
            'name' => 'required|unique:tags,name,' . $tag->id
        ]);

        $tag->name = $request->input('name');
        $tag->save();

        return response()->json(['status' => 'success', 'data' => $tag, 'timestamp' => Carbon::now()]);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['status' => 'error', 'message' => 'Tag not found'], 404);
        }

        $tag->delete();

        return response()->json(['status' => 'success', 'message' => 'Tag deleted', 'timestamp' => Carbon::now()]);
    }
}
