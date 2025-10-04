<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::latest()->paginate(20);
        return \view('panel.colors.index', \compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('panel.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        Color::create($data);
        alert()->success('با تشکر', 'رنگ با موفقیت ثبت شد');
        return \redirect()->route('colors.index');
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
    public function edit(Color $color)
    {
        return \view('panel.colors.edit' , \compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $color->update($data);
        alert()->success('با تشکر', 'رنگ با موفقیت ویرایش شد');
        return \redirect()->route('colors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        alert()->error('با تشکر', 'رنگ با موفقیت حذف شد');
        return \back();
    }
}
