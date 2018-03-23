<?php

namespace App\Http\Controllers;

use App\Comment;
use App\EloquentORM\CommentORM;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Lang;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{
    public function execute(Request $request,$id)
    {
        $userId = Auth::user()->id;
       CommentORM::save($request,$userId,$id);
       return redirect()->back();
    }
    public function create(Request $request)
    {
        if(Auth::user()){
            if ($request->isMethod('post')) {
                $input = $request->except('_token');
                $userId = Auth::user()->id;
                $postId = $input['postId'];
                $comment = CommentORM::save($request,$userId,$postId);
                $data =[
                    'comment' => $comment,
                ];
                return view('comment.comment',$data)->render();
            } else {
                return redirect()->back();
            }
        }else {
            return redirect()->back()->with('status', Lang::get('messages.commit_login'));
        }
    }

    public function createCommentToComment(Request $request)
    {
        if(Auth::user()){

            if ($request->isMethod('post')) {
                $input = $request->except('_token');
                $userId = Auth::user()->id;
                $commentId = $input['commentId'];
                $comment = CommentORM::createCommentToComment($request, $userId, $commentId);
                $data = [
                    'comment' => $comment,
                ];
                return view('comment.comment_to', $data)->render();
            } else {
                return redirect()->back();
            }
        }else {
            return redirect()->back()->with('status', Lang::get('messages.commit_login'));
        }
    }
    public function deleteExecute()
    {
        $data=[
          'comments'=>CommentORM::all(),
        ];
        return view('comment.all',$data);
    }
    public function delete(Request $request, $id)
    {
        if($request->isMethod('delete'))
        {

            $comment = Comment::find($id);
            CommentORM::delete($comment);
            return redirect(route('comment'));
        }
    }

    public function formExecute(Request $request)
    {   $input = $request->except('_token');
        $commentId = $input['commentId'];
        $comment = Comment::find($commentId);
        $data=[
          'comment' =>$comment
        ];
        return view('comment.form_for_comment', $data)->render();
    }
}
