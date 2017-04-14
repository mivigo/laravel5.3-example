<?php
namespace  App\Http\Composers;

use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: serf
 * Date: 14.04.17
 * Time: 16:54
 */
class NavigationComposer
{
    public  function  __construct()
    {

    }

    public  function compose(View $view) {
        $view->with('latest', \App\Article::latest()->first());

    }
}