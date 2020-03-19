<?php

namespace App\Http\Controllers;

use App\Image;
use App\Tag;
use App\Article;
use App\Category;
use Illuminate\Http\Testing\File;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Clase ArticleController controla las acciones del modulo de articulos.
 */
class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Lista de articulos.
     *
     * @param Request $request Contiene la petición.
     * @return Response Regresa una respuesta con una plantilla.
     */
    public function view(Request $request)
    {
        $articles = Article::search($request->search)->orderby('created_at', 'desc')->paginate(6);
        return response()->view('admin.articles.view', ['articles' => $articles]);
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
            return view('admin.articles.show',['article' =>$article]);
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
        $categories = Category::orderBy('name','ASC')->get();
        $tags = Tag::pluck('name','id');
//        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.articles.create',['categories' => $categories, 'tags' => $tags]);
    }
    /**
     * Almacena en la base de datos el articulo creado.
     *
     * @param  ArticlesRequest  $request
     * @return \Illuminate\Http\Response Redirige la vista al listado de articulos.
    */
    public function store(ArticlesRequest $request)
    {
        $article = new Article();
        if ($request->has(['title', 'texto', 'category_id', 'tags']))
        {
            $article->title = $request->title;
            $article->content = $request->texto;
            $article->user_id = Auth::id();
            $article->category_id = $request->category_id;
            $article->save();
            flash('El artículo '.$article->title.' ha sido registrado con exito.')->success();
            $article->tags()->sync($request->tags);
            if ($request->hasFile('imagen'))
            {
                $file = $request->imagen;
                $ruta = public_path() . "/img/articles/";
                $name = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
                $uploadSuccess = $file->move($ruta, $name);
                if ($uploadSuccess) {
                    $image = new Image();
                    $image->name = $name;
                    $image->article()->associate($article);
                    $image->save();
                } else {
                    flash('La imagen del artículo ' . $request->title . ' no pudo ser agregada.')->error();
                }
            }
            else
            {
                flash('La imagen del artículo ' . $request->title . ' no existe.')->error();
            }
        }
        else
        {
            flash('El artículo '.$request->title.' no pudo ser registrado.')->error();
        }
        return response()->redirectToRoute('articlesList');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id Indice.
     * @return \Illuminate\Http\Response Regresa una respuesta con una plantilla.
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::orderBy('name','ASC')->get();
        $tags = Tag::pluck('name','id');
        $my_tags = $article->tags->pluck('id')->ToArray();
        return view('admin.articles.edit', ['article' => $article, 'categories' => $categories, 'tags' => $tags,
            'my_tags' => $my_tags]);
    }
    /**
     * Update the specified article.
     *
     * @param  Request $request Petición.
     * @param  Integer  $id  Indice.
     *
     * @return Response|RedirectResponse Regresa una respuesta con una plantilla.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if ($request->has(['title', 'texto', 'category_id', 'tags']))
        {
            $article->title = $request->title;
            $article->content = $request->texto;
            $article->category_id = $request->category_id;
            $article->update();
            flash('El artículo '.$article->title.' ha sido modificado con exito.')->success();
            $article->tags()->sync($request->tags);
        }
        else
        {
            flash('El artículo '.$request->title.' no pudo ser modificado.')->error();
        }
        return response()->redirectToRoute('articlesList');
    }
    /**
     * Method for delete a article with GET.
     *
     * @param  Integer  $id  Indice.
     *
     * @return Response|RedirectResponse Regresa una respuesta con una plantilla.
     */
    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        flash('El artículo '.$article->title.' ha sido borrado con exito.')->warning();
        return response()->redirectToRoute('articlesList');
    }
}
