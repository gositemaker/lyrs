<?php

namespace App\Http\Controllers;

use App\Models\YogaCategory;
use Illuminate\Http\Request;

class AdminYogaCategoryController extends Controller
{
    public function index()
    {
        $categories = YogaCategory::all();
        return view('admin.yoga_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.yoga_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required|in:session,course',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        YogaCategory::create($data);
        return redirect()->route('admin.yoga_categories.index')->with('success', 'Category created!');
    }

    public function edit(YogaCategory $yoga_category)
    {
        return view('admin.yoga_categories.edit', compact('yoga_category'));
    }

    public function update(Request $request, YogaCategory $yoga_category)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required|in:session,course',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $yoga_category->update($data);
        return redirect()->route('admin.yoga_categories.index')->with('success', 'Category updated!');
    }

    public function destroy(YogaCategory $yoga_category)
    {
        $yoga_category->delete();
        return redirect()->route('admin.yoga_categories.index')->with('success', 'Category deleted!');
    }
}
