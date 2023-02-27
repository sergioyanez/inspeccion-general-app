<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tipo_permiso;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogsUsuarioController;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Crypt;


class UsuarioController extends Controller {

    /**
     * Muestra todos los usuarios
     */
    public function index() {

        $usuario = User::all();
        return view('usuario.usuarios', ['usuarios'=>$usuario]);
    }

    /**
     * Muestra un formulario para crear un nuevo usuario
     */
    public function create() {
        $tiposPermisos = Tipo_permiso::all();
        $usuario = User::all();
        return view('usuario.crear', ['tiposPermisos'=>$tiposPermisos,'usuarios' => $usuario]);
    }

    /**
     * Crea un nuevo usuario
     * @param  \App\Http\Requests\StoreUsuarioRequest $request
     */
    public function store(StoreUsuarioRequest $request) {
        $usuario = new User();
        $usuario->usuario = $request->usuario;
        $usuario->tipo_permiso_id = $request->tipo_permiso_id;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);

        if($usuario->save()) {
            $log = new LogsUsuarioController();
            $log->store($usuario, 'c');
            return redirect()->route('usuarios');
        }
        return back()->with('fail','No se pudo crear el usuario');
    }



     /**
     * Muestra un solo usuario
     * @param  int $id
     */
    public function show($id){
        $usuario = User::find($id);
        $tiposPermisos = Tipo_permiso::all();
        return view('usuario.mostrar', ['usuario' => $usuario, 'tiposPermisos'=>$tiposPermisos]);
    }

     /**
     * Muestra un formulario para editar un usuario
     * @param  int $id
     */
    public function edit($id) {
        $usuario = User::find($id);
        $tiposPermisos = Tipo_permiso::all();
        $usuarios = User::all();
        return view('usuario.crear', ['tiposPermisos'=>$tiposPermisos,'usuarios' => $usuarios, 'usuario'=>$usuario]);
    }

    /**
     * Método para editar un usuario
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     */
    public function update(UpdateUsuarioRequest $request) {
        $usuario = User::find($request->usuario_id);
        $usuario->usuario = $request->usuario;
        $usuario->tipo_permiso_id = $request->tipo_permiso_id;
        $usuario->email = $request->email;
        //$usuario->password = Hash::make($request->password);

        if($usuario->save()){
            $log = new LogsUsuarioController();
            $log->store($usuario, 'u');
            return redirect()->route('usuarios');
        }
        return back()->with('fail','No se pudo actualizar el usuario');

    }

    /**
     * Método para editar perfil de usuario
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     */
    public function updateFace(Request $request) {
        $request->validate([
            'usuario' => 'required',
            'usuario_id' => 'required',
        ]);
        $usuario = User::find($request->usuario_id);
        if(isset($request->password) && Hash::check($request->password,$usuario->password)){
            $request->validate([
                'newPassword' => 'required|min:8',
                'repetirPassword' => 'required|same:newPassword',
            ]);
            $usuario->password = Hash::make($request->newPassword);
        }
        $usuario->usuario = $request->usuario;
        if($usuario->save()){
            $log = new LogsUsuarioController();
            $log->store($usuario, 'u');
            return back();
        }
        return back()->with('fail','No se pudo actualizar el usuario');

    }

    /**
     * Eliminar un usuario
     * @param  int $id
     */
    public function destroy($id) {
        $usuario = User::find($id);

        if($usuario->delete()){
            $log = new LogsUsuarioController();
            $log->store($usuario, 'd');
            return redirect()->route('usuarios');
        }
        return back()->with('fail','No se pudo eliminar el usuario');
    }
}