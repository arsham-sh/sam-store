<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('colors')->latest()->paginate(20);
        $products = Product::latest()->paginate(20);
        return \view('panel.products.index', \compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return \view('panel.products.create' , \compact(['colors' , 'sizes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'slug' => ['unique:products'],
            'description' => 'required',
            'inventory' => 'required',
            'price' => 'required',
            'image' => 'required',
            'colors' => 'required|array',
            'size' => 'required|array',
            'category' => 'required|array',
        ]);

        if (empty($request->slug)) {
            $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        } else {
            $slug = SlugService::createSlug(Product::class, 'slug', $request->slug);
        }

        $request->merge(['slug' => $slug]);

        $product = \auth()->user()->products()->create($data);
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->size);
        $product->categories()->sync($request->category);
        alert()->success('با تشکر', 'محصول با موفقیت ثبت شد');
        return \redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::with(['colors' , 'sizes'])->find($product->id);
        return \view('panel.products.show' , \compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $colors = Color::all();
        $sizes = Size::all();
        return \view('panel.products.edit', \compact(['product' , 'colors' , 'sizes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'inventory' => 'required',
            'price' => 'required',
            'image' => 'required',
            'colors' => 'required|array',
            'category' => 'required|array',
            'size' => 'required|array',
        ]);


        if(empty($request->slug))
        {
             $request->validate([
                'slug' => ['required,unique:products'],
            ]);
        }

        $product->update($request->all());
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->size);
        $product->categories()->sync($request->category);

        alert()->success('با تشکر', 'محصول با موفقیت ویرایش شد');
        return \redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->error('با تشکر', 'محصول با موفقیت حذف شد');
        return \back();
    }
}
