<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return \view('index', \compact('products'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(12);
        $categories = Category::whereNull('category_id')->get();
        return \view('products.products', \compact(['products', 'categories']));
    }

    public function singleProduct(Product $product)
    {
        $colors = $product->colors;
        $sizes = $product->sizes;
        $categories = $product->categories;
        $images = $product->gallery()->latest()->get();
        return \view('products.single-product', \compact(['product', 'colors', 'sizes', 'categories', 'images']));
    }

    // public function category(Category $category)
    // {
    //     // $products = $category->products()->get();
    //     $categories = Category::all();
    //     return \view('products.products' , compact('categories'));
    // }

    public function showCategory(Category $category)
    {
        $products = $category->products()->paginate(12);
        $categories = Category::whereNull('category_id')->get();
        return \view('products.products', compact(['products', 'categories']));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', "%{$request->search}%")->get();
        return \view('search', \compact('products'));
    }

    public function searchProducts(Request $request)
    {
        $categoryIds = [];

        if ($request->filled('category')) {
            $selectedCategory = Category::find($request->category);

            if ($selectedCategory) {
                $categoryIds[] = $selectedCategory->id;

                // گرفتن همه زیر‌دسته‌ها 
                //وگرنه درست عمل نمیکنه
                $childIds = Category::where('category_id', $selectedCategory->id)->pluck('id')->toArray();
                $categoryIds = array_merge($categoryIds, $childIds);
            }
        }

        $products = Product::query()
            ->when(
                count($categoryIds),
                fn($q) =>
                $q->whereHas('categories', fn($query) =>
                $query->whereIn('id', $categoryIds))
                //اشتباه متغیر پاس دادم
            )
            ->when(
                $request->has('min_price') && is_numeric($request->min_price),
                fn($q) => $q->where('price', '>=', $request->min_price)
            )
            ->when(
                $request->has('max_price') && is_numeric($request->max_price),
                fn($q) => $q->where('price', '<=', $request->max_price)
            )
            ->paginate(12);

        return view('products.products', compact('products'));
    }
}
