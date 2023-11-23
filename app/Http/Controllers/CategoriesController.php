<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['data' => $categories, 'timestamp' => Carbon::now(), 'status' => 'success']);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found', 'status' => 'error'], 404);
        }

        return response()->json(['data' => $category, 'timestamp' => Carbon::now(), 'status' => 'success']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return response()->json(['data' => $category, 'timestamp' => Carbon::now(), 'status' => 'success'], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found', 'status' => 'error'], 404);
        }

        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->input('name');
        $category->save();

        return response()->json(['data' => $category, 'timestamp' => Carbon::now(), 'status' => 'success']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found', 'status' => 'error'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted', 'timestamp' => Carbon::now(), 'status' => 'success']);
    }
}
