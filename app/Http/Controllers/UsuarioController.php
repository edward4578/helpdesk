<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use App\rol;
use Laracasts\Flash\Flash;


class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        //Lista de Usuarios Creados
        $usuarios = User::paginate(10);
        return view('usuario.index')->with('usuarios', $usuarios);
       //dd($usuarios);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Vista de Creacion Usuarios
        $roles = rol::all();
        return view('usuario.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {
      
     //Insercion de Usuarios
     User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => $request['password'],
        'rol_id' => $request['rol_id'],
       ]);
      //dd($request);
      Flash::success('Se ha Registrado el Usuario Correcta'); 
      return redirect()->route('usuario.index');
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
        //Edicion de un Usuario y sus Roles
        $usuario = User::find($id); 
        $roles = rol::lists('rol','id');
        return View('usuario.edit')->with('usuario', $usuario)->with(array('roles' => $roles));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        //Actualizacion de un Usuario
        $usuario = user::find($id);
        $usuario->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'rol_id' => $request['rol_id'],
            ]);
        $usuario->save();
        Flash::warning('El usuario <strong>'.$usuario->nombre_usuario.'</strong> ha sido modifcado correctamente');
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elmininacion de un usuario
        $usuario = User::find($id);
        $usuario->delete();
        Flash::error('El usuario '.$usuario->nombre_usuario.' ha sido eliminado correctamente');
        return redirect()->route('usuario.index');
    }
}
