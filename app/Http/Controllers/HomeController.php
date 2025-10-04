<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function comments(Request $request)
    {
        // return $request->all();

        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'nullable|exists:comments,id',
            'comment' => 'required'
        ]);

        \auth()->user()->comments()->create($validData);
        \alert()->success('با تشکر' , 'دیدگاه شما ثبت شد');
        return \back();
    }
}
