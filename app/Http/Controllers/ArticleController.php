<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Article;
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
        return response()->view('articles/view', ['articles' => Article::all()]);
    }
    /**
     * Muestra un articulo con todos sus detalles.
     *
     * @return View Regresa una vista detallada del articulo.
    */
    public function show($id=0)
    {
        return view('articles.show',['article' =>Article::find($id)]);
    }
    /**
     * Crea un articulo.
    */
    public function create()
    {
        if (View::exists('articles.create')) {
            //Existe
        }
        else
        {
            return response()->redirectTo('home');
        }
    }
    /**
     * Update the specified article.
     *
     * @param  Request  $request Petición.
     * @param  string  $id  Indice.
     *
     * @return Response|RedirectResponse Regresa una respuesta con una plantilla.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (isset($article))
        {
            //Crear vista
        }
        if ($request->isMethod('post')) {
            if ($request->has(['title', 'content'])) {
                //guardar datos
                return response()->redirectTo('articlesList');
            }
        }
        else
        {//Error
            return response()->view('error', 505);
        }
    }
}
