<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ImagesController extends Controller
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
     * @param Request $request Contiene la petición.
     * @return \Illuminate\Http\Response Regresa a la lista de imágenes.
     */
    public function index(Request $request)
    {
        $images = Image::search($request->search)->orderby('created_at', 'desc')->paginate(8);
        return view('admin.images.view', ['images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id   Indice de la imagen.
     * @return \Illuminate\Http\Response  Regresa a la lista de imágenes.
     */
    public function edit(int $id)
    {
        $image = Image::find($id);
        return view('admin.images.edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Petición del usuario.
     * @param Integer $id   Indice de la imagen.
     * @return \Illuminate\Http\Response Regresa a la lista de imágenes.
     */
    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        if ($request->hasFile('imagen'))
        {
            $file = $request->imagen;
            $ruta = public_path() . "/img/articles/";
            $name = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->move($ruta, $name);
            if ($uploadSuccess) {
                $image->name = $name;
                $image->update();
                flash('La imagen fue actualizada con éxito.')->success();
            } else {
                flash('La imagen no pudo ser actualizada.')->error();
            }
        }
        else
        {
            flash('El archivo de la imagen no existe.')->error();
        }
        return response()->redirectToRoute('images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id Indice de la imagen.
     * @return \Illuminate\Http\Response Regresa a la lista de imágenes.
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        $archivo = public_path() . "/img/articles/".$image->name;
        if ( unlink($archivo) )
            flash('La imagen fue borrada con éxito.')->warning();
        else
            flash('El archivo de la imagen no pudo ser borrado.')->error();
        return response()->redirectToRoute('images.index');
    }
}
