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
        $categories = Category::pluck('name', 'id');
        $enlacesMenu = array();
        $i=0;
        foreach ($categories as $category)
        {
            $nameCategory = strtolower( $category );
            $nameCategory = str_replace( "á", "a", $nameCategory );
            $nameCategory = str_replace( "é", "e", $nameCategory );
            $nameCategory = str_replace( "í", "i", $nameCategory );
            $nameCategory = str_replace( "ó", "o", $nameCategory );
            $nameCategory = str_replace( "ú", "u", $nameCategory );
            $nameCategory = str_replace( "ä", "a", $nameCategory );
            $nameCategory = str_replace( "ë", "e", $nameCategory );
            $nameCategory = str_replace( "ï", "i", $nameCategory );
            $nameCategory = str_replace( "ö", "o", $nameCategory );
            $nameCategory = str_replace( "ü", "u", $nameCategory );
            $nameCategory = str_replace( "ñ", "ni", $nameCategory );
            $resultado = array_push($enlacesMenu, $nameCategory);
        }
        return view('welcome', ['articles' => $articles, 'categories' => $categories, 'enlacesMenu' => $enlacesMenu]);
    }

    /**
     * Show the articles of tecnologi.
     * @param Request $request Petición del usuario.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Return the view.
     */
    public function tecnologia(Request $request)
    {
        $arregloIds = Category::search('Tecnología');
        if($arregloIds != null)
        {
            $articles = Article::searchByCategory($request->search, $arregloIds)->orderby('created_at', 'desc')->paginate(6);
            return view('welcome', ['articles' => $articles]);
        }
        else
            return Response::HTTP_INTERNAL_SERVER_ERROR; //"<h1>Error 505</h1>";
    }
}
