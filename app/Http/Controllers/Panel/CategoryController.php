<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return \view('panel.categories.index', \compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::where('category_id', null)->get();
        return view('panel.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'unique:categories',
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        Category::create($request->all());
        alert()->success('با تشکر', 'دسته بندی با موفقیت ثبت شد');
        return \redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::where('category_id', null)->where('id', '!=', $category->id)->get();
        return view('panel.categories.edit', compact(['category', 'parentCategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($request->parent) {
            $request->validate([
                'category_id' => ['nullable', 'exists:categories,id']
            ]);
        }

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:categories',
        ]);

        $category->update($request->all());
        alert()->success('با تشکر', 'دسته بندی با موفقیت ویرایش شد');
        return \redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->error('با تشکر', 'محصول با موفقیت حذف شد');
        return \back();
    }
}
