<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = Image::search($request->search)->orderby('created_at', 'desc')->paginate(8);
        return view('admin.images.view', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Error 404";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Error 404";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $image = Image::find($image->id);
        return view('admin.images.edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image = Image::find($image->id);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $ruta = public_path() . "/img/articles/";
        $file = file($ruta.$image->name);
        dd($file);
    }
}
