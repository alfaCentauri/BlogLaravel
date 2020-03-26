<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Clase PublicController controla las acciones del módulo público.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.0.
 */
class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::skip(0)->take(4)->orderby('created_at', 'desc')->get();
        return view('welcome', ['articles' => $articles, ]);
    }

    /**
     * Show the articles of tecnologi.
     *
     * @param string  $name Nombre de la categoría.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Return the view.
     */
    public function searchCategory(string $name)
    {
        $category = Category::SearchByName($name)->first();
        $articles =  $category->articles()->paginate(4);
        return view('publico.category', ['articles' => $articles, ]);
    }
    /**
     * Show the articles of tecnologi.
     *
     * @param string  $name Nombre del tag.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Return the view.
     */
    public function searchTag(string $name)
    {
        $tag = Tag::SearchbyName($name)->first();
        $articles =  $tag->articles()->paginate(4);
        return view('publico.category', ['articles' => $articles, ]);
    }
}
