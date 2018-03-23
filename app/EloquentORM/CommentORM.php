<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 19:29
 */

namespace App\EloquentORM;


use App\Comment;
use App\Category;
use App\CommentToComment;
use App\Contracts\CommentDAOint;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class CommentORM implements CommentDAOint
{

    public static function save(Request $request, $userId, $postId)
    {
        $input = $request->except('_token');
        $data =
            [   'text' =>$input['text'],
                'user_id'=>$userId,
                'post_id'=>$postId
            ];
        $comment = new Comment();
        $comment->fill($data);
        $comment->save();
        return $comment;
    }

    public static function delete(Comment $comment)
    {
        $comment->delete();
    }

    public static function get($id)
    {
        // TODO: Implement get() method.
    }

    public static function update($id, User $user)
    {
        // TODO: Implement update() method.
    }

    public static function all()
    {
        return Comment::all();
    }

    public static function createCommentToComment(Request $request, $userId, $commentId)
    {
        $input = $request->except('_token');
        $data =
            [   'text' =>$input['text'],
                'user_id'=>$userId,
                'comment_id'=>$commentId
            ];
        $comment = new Comment();
        $comment->fill($data)->save();
        return $comment;
    }
}