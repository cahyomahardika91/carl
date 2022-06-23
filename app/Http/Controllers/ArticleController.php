<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required'],
            'subject' => ['required'],
        ]);

        $articles = auth()->user()->articles()->create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'subject_id' => request('subject'),
        ]);

        return $articles; 
    }
    //
    public function show(Article $article){
        return $article;
    }
}
