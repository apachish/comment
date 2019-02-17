<?php

namespace App\Http\Controllers;

use App\City;
use App\Comment;
use App\Http\Requests\StoreCommentPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['Check.login','check.platform','check.json'])->only(['show', 'update', 'delete']);
    }

    public function show()
    {
        $city = City::find(Auth::user()->city_id);
        return $city->comments()->get();
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
//        $request->validate([
//            'comment' => 'required|string|max:1000'
//        ]);
        $this->authorize('update',$comment);

         $comment->update($request->only(['comment']));
         return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
