<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Post;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Request $request)
    {

        $post = new Post();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;

        $post->save();

        return redirect('/editor');
    }
}
