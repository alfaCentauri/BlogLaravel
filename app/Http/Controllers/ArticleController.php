<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Lista de articulos.
     *
     * @return Response Regresa una respuesta con una plantilla.
    */
    public function view()
    {
        $articles = Article::orderby('title', 'ASC')->paginate(4);
        return response()->view('articles/view', ['articles' => $articles]);
    }
    /**
     * Muestra un articulo con todos sus detalles.
     *
     * @return View Regresa una vista detallada del articulo.
    */
    public function show($id=0)
    {
        $article = Article::find($id);
        if (!is_null($article))
            return view('articles.show',['article' =>$article]);
        else
            return 'Error articulo no encontrado.';
    }
    /**
     * Crea un formulario para generar un nuevo articulo.
     *
     * @return RedirectResponse|Response|Redirect Regresa una repuesta con una plantilla ó regresa al home.
    */
    public function create()
    {
        return response()->view('articles.create');
    }
    /**
     * Almacena en la base de datos el articulo creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Redirige la vista al listado de articulos.
    */
    public function store(Request $request)
    {
        $article = new Article();
        if ($request->has(['title', 'content', 'category_id']))
        {
            $article->title = $request->title;
            $article->content = $request->texto;
            $article->category_id = $request->category_id;
            $article->save();
        }
        return response()->redirectToRoute('articlesList');
    }
    /**
     * Update the specified article.
     *
     * @param  Request $request Petición.
     * @param  string  $id  Indice.
     *
     * @return Response|RedirectResponse Regresa una respuesta con una plantilla.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        return response()->view('articles/update', ['article' => $article]);
//        if ($request->has(['title', 'content'])) {
//            $article->title = $request->title;
//            $article->content = $request->texto;
//            $article->category_id = $request->category_id;
//            $article->update();
//            return response()->redirectToRoute('articlesList');
//        }
//        else
//        {//Error
//            return response()->view('error', 505);
//        }

    }
}
