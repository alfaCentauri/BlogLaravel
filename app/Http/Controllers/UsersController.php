<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response Regresa una respuesta con una plantilla y un listado de los usuarios.
     */
    public function index()
    {
        $users = User::orderby('name', 'ASC')->paginate(5);
        return view('admin.users.view')->with('users',$users);
//        return response()->view('admin.users.view', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request  Petición del usuario.
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        if ($request->has(['name', 'email', 'password', 'type']))
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = $request->type;
            $user->save();
            flash('El usuario '.$user->name.' ha sido registrado con exito.')->success();
        }
        else
        {
            flash('El usuario '.$request->name.' no pudo ser registrado.')->error();
        }
        return response()->redirectToRoute('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->has(['name', 'email', 'type']))
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = $request->type;
            $user->save();
            flash('El usuario '.$user->name.' ha sido actualizado con exito.')->success();
        }
        else
        {
            flash('El usuario '.$request->name.' no pudo ser actualizado.')->error();
        }
        return response()->redirectToRoute('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse Regresa al panel de administración de usuarios.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('El usuario '.$user->name.' fue borrado.')->warning();
        return response()->redirectToRoute('users.index');
    }
}
