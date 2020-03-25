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
        $enlacesMenu = $this->reemplazarCaracteresEspeciales($categories);
        return view('welcome', ['articles' => $articles, 'categories' => $categories, 'enlacesMenu' => $enlacesMenu]);
    }

    /**
     * Prepara los enlaces de las categorias para ser insertados en el html. Reemplaza los acentos, las dieresis y la ñ.
     *
     * @param $categories Listado de categorias.
     * @return array Regresa un arreglo con los nombres de las categorias sin acentos, ni dieresis o la letra ñ.
     */
    private function reemplazarCaracteresEspeciales($categories)
    {
        $linksDepurados = array();
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
            array_push($linksDepurados, $nameCategory);
        }
        return $linksDepurados;
    }
    /**
     * Show the articles of tecnologi.
     * @param Request $request Petición del usuario.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Return the view.
     */
    public function tecnologia(Request $request)
    {
        $category = Category::find(1);
        $categories = Category::pluck('name', 'id');
        $enlacesMenu = $this->reemplazarCaracteresEspeciales($categories);
        if($category != null)
        {
            $articles = Article::searchByCategory($request->search, $category->id)->orderby('created_at', 'desc')->paginate(6);
            return view('publico.tecnologia', ['articles' => $articles, 'categories' => $categories,
                'enlacesMenu' => $enlacesMenu]);
        }
        else
            return Response::HTTP_INTERNAL_SERVER_ERROR; //"<h1>Error 505</h1>";
    }
}
