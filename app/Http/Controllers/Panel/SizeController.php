<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::latest()->paginate(20);
        return \view('panel.sizes.index', \compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('panel.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Size::create($data);
        alert()->success('با تشکر', 'سایز کفش با موفقیت ثبت شد');
        return \redirect()->route('sizes.index');
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
    public function edit(Size $size)
    {
        return \view('panel.sizes.edit' , \compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $size->update($data);
        alert()->success('با تشکر', 'سایز کفش با موفقیت ویرایش شد');
        return \redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        alert()->error('با تشکر', 'سایز کفش با موفقیت حذف شد');
        return \back();
    }
}