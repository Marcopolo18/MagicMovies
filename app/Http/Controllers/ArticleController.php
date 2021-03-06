<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\Subs;
use App\Models\Role;
use App\Models\Permission;
use phpDocumentor\Reflection\Types\Boolean;

class ArticleController extends Controller
{
    public function storeArticle(Request $request)
    {
        //validate


        //storing action
        $img_filename = null;
        if ($request->image) {
            $img_filename = time() . '.' . $request->image->extension(); // !
            $request->image->move(public_path('images'), $img_filename); // !

        }

        $article = new Article();
        $article->category = $request->category;
        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->content;
        //md try merge
        $article->approved = boolval(1);
        $article->img_filename = $img_filename;

        $article->save();

        //routing
        return back()
            ->with('file_path', $img_filename);
    }

    public function allArticles()
    {
        $articles = Article::latest()->where('approved', '1')->paginate(7); //added where merge md

        return view('/welcome')->with('articles', $articles);
    }

    //md try approved
    public function approveArticle($id)
    {
        $approveArticle = Article::findOrFail($id);

        $approveArticle->approved = boolval(1);

        $approveArticle->save();

        return back();
    }


    //attempt at search bar    
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $results = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the results compacted
        return view('/search', compact('results'));
    }
}
