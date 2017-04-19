<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag){

//        return $tag;
//        $articles = $tag->articles;
        $articles = $tag->articles()->published()->get();

        return view('articles.index', compact('articles'));
    }
}
