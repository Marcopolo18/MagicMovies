<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subs;
use App\Models\User;
use App\Models\Article;
use App\Models\Role;
use App\Models\Permission;





class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //attempt at user role with anita..define editor
    public function hack()
    {
        $user = User::findOrFail(1);
        $user->assignRole('editor');
    }
    // public function newpost(Request $request)
    // {
    //     $article = new Article();
    //     $article->category = $request->category;
    //     $article->title = $request->title;
    //     $article->author = $request->author;
    //     $article->content = $request->content;
    //     $article->file_path = $request->file_path;

    //     $article->save();

    //     return redirect('/editor');
    // }

    public function newsub(Request $request)
    {

        //storing action
        $img_filename = null;
        if ($request->image) {
            $img_filename = time() . '.' . $request->image->extension(); // !
            $request->image->move(public_path('images'), $img_filename); // !
        }

        $post = new Article(); //md try merge changed Subs to Article
        $post->category = $request->category;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        //md try merge add approved line
        $post->approved = boolval(0);
        $post->img_filename = $img_filename;

        $post->save();

        return redirect('/welcome');

        // return back()
        //     ->with('file_path', $img_filename);
    }

    public function approveSub()
    {
    }

    //attempt at image md
    // public function uploadImage(Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required|string|max:255',
    //         'images' => 'required|file|mimetypes:image/png, jpg, svg',
    //     ]);
    //     $image = new Post;
    //     $image->title = $request->title;
    //     if ($request->hasFile('image')) {
    //         $path = $request->file('image')->store('images', ['disk' => 'my_files']);
    //         $image->image = $path;
    //     }
    //     $image->save();
    // }

    public function showAll()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        $subs = Subs::all();


        return view('/editor', [
            'articles' => $articles,
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
        $article = Article::findOrFail($id);
        return view('/article', ['article' => $article]);
    }

    public function delete($id)
    {
        $result = Article::findOrFail($id)->delete();
        return back();
    }

    public function deleteSub($id)
    {
        $result = Subs::findOrFail($id)->delete();
        return redirect('/editor');
    }
}
