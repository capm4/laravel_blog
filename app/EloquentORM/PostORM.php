<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 15:27
 */

namespace App\EloquentORM;


use App\Category;
use App\Contracts\PostDAOInt;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Lang;

class PostORM implements PostDAOInt
{

    public static function save(Request $request, $userId, $categoryId)
    {
        $input = $request->except('_token');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $storeName = $input['title'].Carbon::now()->format('dhmm');
            $file->move(public_path().'/img/post/'.$storeName.'/',$input['image']);
        }else{
            $input['image'] = '';
        }
        $data =
            [   'title' =>$input['title'],
                'alias'=>strtolower($input['title']),
                'text'=>$input['text'],
                'image'=>$input['image'],
                'user_id'=>$userId,
                'storeName'=>$input['title'].Carbon::now()->format('dhmm'),
                'category_id'=>$categoryId
            ];
        $post = new Post();
        $post->fill($data)->save();
        return redirect(route('admin_all_posts'))->with('status',Lang::get('messages.post_edit'));
    }


    public static function delete(Post $post)
    {
        $post->delete();
    }

    public static function get($id)
    {
        return Post::find($id);
    }

    public static function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $post = Post::find($id);
        $input['image'] = $post->image;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/img/post/'.$post->storeName.'/',$input['image']);
        }
        $data =
            [   'title' =>$input['title'],
                'text'=>$input['text'],
                'image'=>$input['image'],
                'category_id'=>$input['category']
            ];
        $post->fill($data)->update();
    }

    public static function all()
    {
        if($posts = Post::all())
        {
            return $posts;
        }else{
            abort(404);
        }
    }


}