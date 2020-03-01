<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
/**
 * Clase ArticleController controla las acciones del modulo de articulos.
 */
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
     * @return \Illuminate\Contracts\View\Factory|View
    */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create',['categories' => $categories]);
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
        if ($request->has(['title', 'category_id']))
        {
            $article->title = $request->title;
            $article->content = $request->texto;
            $article->user_id = 1;
            $article->category_id = $request->category_id;
            $article->save();
            flash('El articulo '.$article->title.' ha sido registrado con exito.')->success();
        }
        else
        {
            flash('El articulo '.$request->title.' no pudo ser registrado.')->error();
        }
        return response()->redirectToRoute('articlesList');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article',$article);
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
        if ($request->has(['title', 'content'])) {
            $article->title = $request->title;
            $article->content = $request->texto;
            $article->category_id = $request->category_id;
            $article->update();
            return response()->redirectToRoute('articlesList');
        }
        else
        {//Error
            return response()->view('error', 505);
        }
    }
}
