<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::all();
        $category = category::query()->orderBy('updated_at', 'DESC')->paginate(10);

        return view('category.index', [
            'categories' => $category
        ]);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        category::query()->create($validated);

        return to_route('category.index');
    }
    public function edit($id)
    {
        $category = category::query()->find($id);

        return view('category.edit', [
            'category' => $category
        ]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $category = category::query()->find($id);
        $category->update($validated);
        return to_route('category.index');
    }
    public function destroy($id)
    {
        $category = category::query()->find($id);
        $category->delete();

        return to_route('category.index');
    }
}
