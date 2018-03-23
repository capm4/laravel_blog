<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 19:28
 */

namespace App\Contracts;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Comment;
interface CommentDAOint
{
    public static function save(Request $request, $userId, $postId);
    public static function delete(Comment $comment);
    public static function createCommentToComment(Request $request, $userId, $commentId);
    public static function get($id);
    public static function update($id, User $user);
    public static function all();
}