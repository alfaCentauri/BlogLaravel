<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response Regresa una respuesta con una plantilla y un listado de las categorias.
     */
    public function index()
    {
        $categories = Category::orderby('name', 'ASC')->paginate(8);
        return view('admin.categories.view')->with('categories',$categories);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->redirectToRoute('categories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response Regresa una vista con el formulario para crear una categoría.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesRequest $request Petición del usuario.
     * @return Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = new Category();
        if ($request->has(['name']))
        {
            $category->name = $request->name;
            $category->save();
            flash('La categoría '.$category->name.' ha sido registrado con exito.')->success();
        }
        else
        {
            flash('La categoría '.$request->name.' no pudo ser registrado.')->error();
        }
        return response()->redirectToRoute('categories.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id Indice de la categoría.
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category',$category);
    }
    /**
     * Update the specified resource in storage. Valida el contenido del formulario y genera el mensaje de error
     * correspondiente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Indice de la categoría.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'min:4|max:120|required|alpha',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El mínimo para el nombre es de 4 caracteres.',
            'name.max' => 'El máximo para el nombre es de 120 caracteres.',
        ]);
        if ($validator->fails()) {
            return response()->redirectToRoute('categories.edit',['category' => $category])
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has(['name']))
        {
            $category->name = $request->name;
            $category->save();
            flash('La categoría '.$category->name.' ha sido actualizada con exito.')->success();
        }
        else
        {
            flash('La categoría  '.$request->name.' no pudo ser actualizado.')->error();
        }
        return response()->redirectToRoute('categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id Indice de la categoría.
     * @return \Illuminate\Http\RedirectResponse Regresa al panel de administración de categorías.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        flash('La categoría '.$category->name.' fue borrada.')->warning();
        return response()->redirectToRoute('categories.index');
    }
}
