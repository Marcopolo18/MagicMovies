<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subs;





class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function newpost(Request $request)
    {
        $post = new Post();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->file_path = $request->file_path;

        $post->save();

        return redirect('/editor');
    }

    public function newsub(Request $request)
    {
        $post = new Subs();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->file_path = $request->file_path;

        $post->save();

        return redirect('/welcome');
    }

    public function showAll()
    {
        $posts = Post::all();
        $subs = Subs::all();


        return view('/editor', [
            'posts' => $posts,
            'subs' => $subs,
        ]);
    }

    public function allPosts()
    {
        // $posts = Post::all();

        // return view('/welcome', [
        //     'posts' => $posts


        // ]);
        $posts = Post::latest()->paginate(5);

        return view('/welcome')->with('posts', $posts);
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);
        return view('/article', ['post' => $post]);
    }

    public function delete($id)
    {
        $result = Post::findOrFail($id)->delete();
        return redirect('/editor');
    }

    public function deleteSub($id)
    {
        $result = Subs::findOrFail($id)->delete();
        return redirect('/editor');
    }
}
