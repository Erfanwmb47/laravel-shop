<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Comment::factory()->count(1)->create();
        //dd(Comment::find(8)->user->username);
        return view('Admin.Comments.Index', [
            'comments' => $this->PaginatePagez(Comment::query(), $request,['text'],['user','username','firstName','lastName','email'])
        ]);
        //TODO search username
    }

    public function ApprovedIndex(Request $request)
    {
        $comment = $this->PaginatePagez(Comment::whereApproved('allow'), $request,['text'],['user','username','firstName','lastName','email']);
        return view('Admin.Comments.Index', [
            'comments' => $comment
        ]);

    }

    public function unApprovedIndex(Request $request)
    {
        $comment = $this->PaginatePagez(Comment::whereApproved('deny'), $request,['text'],['user','username','firstName','lastName','email']);
        return view('Admin.Comments.Index', [
            'comments' => $comment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comment $comment)
    {
    $comment->update([
        'text' => $request->text,
    ]);
        Alert::toast('دیدگاه موردنظر با موفیت ویرایش شد', 'success');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function updateApproved(Comment $comment)
    {
        //dd($comment);
        if ($comment->approved == 'allow') {
            $comment->update(['approved' => 'deny']);
            Alert::toast('دیدگاه موردنظر غیرفعال شد', 'success');
        }
        elseif ($comment->approved == 'deny') {
            $comment->update(['approved' => 'allow']);
            Alert::toast('دیدگاه موردنظر فعال شد', 'success');
        }
        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        Alert::toast('دیدگاه موردنظر حذف شد', 'success');
        return back();
    }
}
