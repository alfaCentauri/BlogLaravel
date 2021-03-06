<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Clase PublicController controla las acciones del módulo público.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.1.
 */
class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View Return the view.
     */
    public function index()
    {
        $articles = Article::skip(0)->take(4)->orderby('created_at', 'desc')->get();
        return view('welcome', ['articles' => $articles, ]);
    }

    /**
     * Show the articles for category.
     *
     * @param string  $name Nombre de la categoría.
     * @return Factory|View Return the view.
     */
    public function searchCategory(string $name)
    {
        $category = Category::SearchByName($name)->first();
        $articles =  $category->articles()->paginate(4);
        return view('publico.category', ['articles' => $articles, 'nameCategory' => $name]);
    }

    /**
     * Show the articles for tag.
     *
     * @param string  $name Nombre del tag.
     * @return Factory|View Return the view.
     */
    public function searchTag(string $name)
    {
        $tag = Tag::SearchByName($name)->first();
        $articles =  $tag->articles()->paginate(4);
        return view('publico.tag', ['articles' => $articles, 'nameTag' => $name]);
    }
}
