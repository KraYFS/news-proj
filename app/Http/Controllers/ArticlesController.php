<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employees;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function main(){
        return view('articles.main', [
            'articles' => Article::query()->with([
                'creators'
            ])->where('is_active', 1)->orderBy('public_at', 'desc')->paginate(9),
        ]);
    }

    public function info(
       string $slug
    ){
        $article = Article::query()->with([
            'creators'
        ])->where('is_active', 1)->where('slug', $slug)->firstOrFail();

        $article->update([
            'views' => $article->views + 1
        ]);

        return view('articles.info', [
            'articles' => $article
        ]);
    }
}
