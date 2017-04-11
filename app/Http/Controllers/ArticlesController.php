<?php

namespace App\Http\Controllers;

use App\Tag;
use Auth;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//use Request;


//use Illuminate\Http\Request;
class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'create']);
//        $this->middleware('auth', ['only' => 'create']);
    }

    public function  index () {

//        return Auth::user();

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show (Article $article) {

//        $article = Article::findOrFail($id);

//        dd($article);
//        return $article;

        return view ('articles.show', compact('article'));

    }

    public function create () {

        $tags = Tag::pluck('name', 'id');
        return view ('articles.create', compact('tags'));

    }

    public function store (ArticleRequest $request) {
//        dd($request->input('tag_list'));
//            public function store (ArticleRequest $request) {
//        $input['published_at'] = Carbon::now();
//        Article::create(Request::all());
//        Article::create($request->all());
//        $article = new Article($request->all());

        $article = Auth::user()->articles()->create($request->all());
        $this->createArticle($request);
////        Auth::user()->articles;     //Collection
////        Auth::user()->articles();   //Object

//        $article->tags()->attach($request->input('tag_list'));


        // the same as next
//        session()->flash('flash_message', 'Your article has been created');
//        session()->flash('flash_message_important', true);
//        \Session::flash('flash_message', 'Created');
//        \Flash::success();
//        \Flash::errors();

        $article->tags()->attach($request->input('tag_list'));
            flash()->success('Your article has been created')
//            flash()->overlay('Your article has been created');
                ->important();

//        if ($request->all()) {
//            $request->session()->flash('message.level', 'success');
//            $request->session()->flash('message.content', 'Post was successfully added!');
//        } else {
//            $request->session()->flash('message.level', 'danger');
//            $request->session()->flash('message.content', 'Error!');
//        }

        return redirect ('articles')->with('flash_message');
//            ->with([
//            'flash_message' => 'Your article has been created',
//            'flash_message_important' => true
//        ]);

    }
    public function edit (Article $article) {
//    public function edit ($id) {
//        $article = Article::findOrFail($id);

        $tags = Tag::pluck('name', 'id');
        return view ('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) {
//        $article = Article::findOrFail($id);
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));
//        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles');
    }

    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}
