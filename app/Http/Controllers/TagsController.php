<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;
use Illuminate\Support\Facades\Validator;
/**
 * Clase TagsController controla las acciones del módulo etiquetas.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.0.
 */
class TagsController extends Controller
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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::search($request->search)->orderby('name', 'ASC')->paginate(5);
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagsRequest  $request
     * @return Response|\Illuminate\Http\RedirectResponse
     */
    public function store(TagsRequest $request)
    {
        $tag = new Tag();
        if ($request->has(['name']))
        {
            $tag->name = $request->name;
            $tag->save();
            flash('La etiqueta '.$tag->name.' ha sido registrada con exito.')->success();
        }
        else
        {
            flash('La etiqueta '.$request->name.' no pudo ser registrada.')->error();
        }
        return response()->redirectToRoute('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Tag $tag)
    {
        return response()->redirectToRoute('tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id Indice de la etiqueta.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $tagCurrent = Tag::find($id);
        return view('admin.tags.edit')->with('tag', $tagCurrent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tag $tag)
    {
        $tagCurrent = Tag::find($tag->id);
        $validator = Validator::make($request->all(), [
            'name' => 'min:4|max:150|required',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El mínimo para el nombre es de 4 caracteres.',
            'name.max' => 'El máximo para el nombre es de 150 caracteres.',
        ]);
        if ($validator->fails()) {
            return response()->redirectToRoute('tags.edit',['tag' => $tagCurrent])
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has(['name']))
        {
            $tagCurrent->name = $request->name;
            $tagCurrent->save();
            flash('La etiqueta '.$tagCurrent->name.' ha sido actualizada con exito.')->success();
        }
        else
        {
            flash('La etiqueta  '.$request->name.' no pudo ser actualizado.')->error();
        }
        return response()->redirectToRoute('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id Indice de la etiqueta.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagCurrent = Tag::find($id);
        $tagCurrent->delete();
        flash('La etiqueta '.$tagCurrent->name.' fue borrada.')->warning();
        return response()->redirectToRoute('tags.index');
    }
}
