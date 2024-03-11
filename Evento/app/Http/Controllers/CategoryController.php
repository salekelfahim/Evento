<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ShowCategory()
    {
        $categories = Category::paginate(5);

        return view('addcategory', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $checkCategory = Category::where('name', $request->input('categoryName'))->first();

        if ($checkCategory) {

            return redirect()->back()->with('error', 'Category already exists!');
        }
        $category = new Category([
            'name' => $request->input('categoryName'),
        ]);

        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }


    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->input('categoryName');
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }
}
