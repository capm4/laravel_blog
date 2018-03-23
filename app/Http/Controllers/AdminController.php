<?php

namespace App\Http\Controllers;

use App\Category;
use App\EloquentORM\CategoryORM;
use App\EloquentORM\PostORM;
use App\EloquentORM\UserORM;
use App\Role;
use App\User;
use Aws\Middleware;
use Illuminate\Http\Request;
use Validator;
use Lang;
use Gate;
use Auth;
class AdminController extends Controller
{
    public function allPosts()
    {
        if(Gate::allows('postEdit', Auth::user())) {
            $data =
                [
                    'posts' => PostORM::all(),
                ];
            return view('admin.posts', $data);
        }else
        {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }

    }

    public function createPost(Request $request)
    {
        if(Gate::allows('postEdit',Auth::user())) {
            if ($request->isMethod('get')) {
                $categories = array();
                $arr = Category::all();
                foreach ($arr as $category) {
                    $categories[$category->id] = $category->title;
                }
                $data =
                    [
                        'categories' => $categories,
                    ];
                return view('admin.create_post', $data);

            } elseif ($request->isMethod('post')) {
                return PostORM::save($request, $request['userId'], $request['category']);

            } else {
                return redirect()->back()->withErrors('something went wrong');
            }
        }else {
            return redirect()->back()->withErrors('You have no such role')->withInput();
        }
    }

    public function editPost(Request $request, $id)
    {
        if(Gate::allows('postEdit',Auth::user())) {
            if ($request->isMethod('delete')) {
                $post = PostORM::get($id);
                PostORM::delete($post);
                return redirect()->route('admin_all_posts')->with('status', 'Post delete');
            }
            if ($request->isMethod('post')) {
                PostORM::update($request, $id);
                return redirect(route('admin_edit_post', array('id' => $id)));
            } else {
                $categories = array();
                $arr = Category::all();
                foreach ($arr as $category) {
                    $categories[$category->id] = $category->title;
                }
                $data =
                    [
                        'post' => PostORM::get($id),
                        'categories' => $categories,
                    ];
                return view('admin.post_edit', $data);
            }
        }else {
        return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function editPostCategory (Request $request, $id)
    {
        if(Gate::allows('isAdmin',Auth::user())) {
            PostORM::updateCategory($id, $request['category']);
            redirect(route('admin_edit_post', array('id' => $id)));
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }

    }
    public function allUsers()
    {
        if(Gate::allows('isAdmin',Auth::user())) {
            $data=
                [
                    'users'=>User::all(),
                ];
            return view('admin.users',$data);
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function userAddRole(Request $request, $id)
    {
        if(Gate::allows('isAdmin',Auth::user()))
        {
            UserORM::updateRole($id,$request['roleId']);
            return redirect(route('admin_all_users'));
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function userDeleteRole(Request $request, $id)
    {
        if(Gate::allows('isAdmin',Auth::user()))
        {
            UserORM::deleteRole($id,$request['roleId']);
            return redirect(route('admin_all_users'));
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function allCategories()
    {
        if(Gate::allows('isAdmin',Auth::user()))
        {
            $data =
                [
                    'categories' => CategoryORM::all(),
                ];
            return view('admin.categories', $data);
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function editCategories(Request $request, $id)
    {
        if(Gate::allows('isAdmin',Auth::user()))
        {
            if($request->isMethod('get'))
            {
                $data=
                    [
                    'category'=>CategoryORM::get($id),
                    ];
                return view('admin.category_edit',$data);
            }elseif ($request->isMethod('post')) {
                CategoryORM::update($request, $id);
                return redirect(route('admin_edit_categories', array('id' => $id)));
            }elseif ($request->isMethod('delete'))
            {
                $category = CategoryORM::get($id);
                if($category)
                {
                    CategoryORM::delete($category);
                    return redirect(route('admin_categories'));
                }else{
                    return redirect()->back();
                }
            }else
            {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }
    }

    public function createCategories(Request $request)
    {
        if(Gate::allows('isAdmin',Auth::user()))
        {
            if($request->isMethod('get'))
            {
                return view('admin.create_category');
            }elseif ($request->isMethod('post')) {
                CategoryORM::save($request);
                return redirect(route('admin_categories'));
            }else
            {
                return redirect()->back();
            }
            }
        else {
            return redirect()->back()->withErrors('You have such role')->withInput();
        }

    }
}
