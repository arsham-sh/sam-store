<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $images = $product->gallery()->latest()->paginate(20);
        return \view('panel.products.gallery.all' , \compact(['product', 'images']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return \view('panel.products.gallery.create' , \compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
        $validated = $request->validate([
            'images.*.image' => 'required'
        ]);

        \collect($validated['images'])->each(function($image) use($product){
            $product->gallery()->create($image);
        });

        alert()->success('با تشکر', 'تصویر با موفقیت ثبت شد');
        return \redirect()->route('products.gallery.index' , \compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product , ProductGallery $gallery)
    {
        $gallery->delete();
        alert()->error('با تشکر', 'تصویر با موفقیت حذف شد');
        return \redirect()->route('products.gallery.index' , \compact('product'));
    }
}