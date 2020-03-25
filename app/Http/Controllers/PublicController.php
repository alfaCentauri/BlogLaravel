<?php

namespace App\Http\Controllers;

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
     * @param Request $request Petición del usuario.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Return the view.
     */
    public function tecnologia(Request $request)
    {
        $category = Category::find(1);
        if($category != null)
        {
            $articles = Article::searchByCategory($request->search, $category->id)->orderby('created_at', 'desc')->paginate(4);
            return view('publico.tecnologia', ['articles' => $articles, ]);
        }
        else
            return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
