<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllPost() 
    {
        $posts = DB::table('posts')->get();
        return view('posts',compact('posts'));

    }
    public function addPost()
    {
        return view('add-post');
    }
    public function addPostSubmit(Request $request)
    {
        DB::table('posts')->insert([
            'subject' => $request -> subject,
            'content' => $request -> content,
            'user_id' => 1
        ]);
        return back() -> with('post_created','作成成功');
    }
    public function getPostById($id)
    {
        $post = DB::table('posts')-> where('id',$id)->first();
        return view('single-post',compact('post'));
    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('edit-post', compact('post'));
    }
    public function updatePost(Request $request )
    {
        DB::table('posts')->where('id',$request->id)->update(
            [
                'subject' => $request -> subject,
                'content' => $request -> content
            ]
            );
            return back() -> with('post_updated', '修正完了です。');
    }  
    public function deletePost($id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return back() -> with('post_deleted', '削除完了です。');
    }
    public function innerJoinClause()
    {
        $posts = DB::table('users')
        // $request = DB::table('users')
        ->join('posts','users.id','=','posts.user_id')
        ->select('posts.id','users.name','users.email','posts.subject','posts.content')
        ->get();
        //  return $request;
        // print_r($request);
        return view('join-view',compact('posts'));
    }
    public function getAllPostsUsingModel()
    {
        $posts = Post::all();
        return view('all-view',compact('posts'));
    }
}
