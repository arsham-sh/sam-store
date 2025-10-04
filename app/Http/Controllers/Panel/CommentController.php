<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::whereApproved(1)->latest()->paginate(20);
        return \view('panel.comments.comments' , \compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function unApproved()
    {
        $comments = Comment::whereApproved(0)->latest()->paginate(20);
        return \view('panel.comments.unapproved' , \compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update(['approved' => 1]);
        \alert()->success('با تشکر' , 'دیدگاه با موفقیت تایید شد');
        return \back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        \alert()->error('با تشکر' , 'دیدگاه با موفقیت حذف شد');
        return \back();
    }
}
