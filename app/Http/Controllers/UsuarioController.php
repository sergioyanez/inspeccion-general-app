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
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller {

    /**
     * Muestra todos los usuarios
     */
    public function index() {
        $usuario = User::where('usuario', '!=', 'tudai')->get();
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
            return redirect()->route('usuarios')->with('success','Creado con éxito');
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
        $request->validate([
            'usuario' => 'required|unique:users,usuario,'.$request->usuario_id,
            'email' => 'required|unique:users,email,'.$request->usuario_id,
        ]);
        $usuario = User::find($request->usuario_id);
        $usuario->usuario = $request->usuario;
        $usuario->tipo_permiso_id = $request->tipo_permiso_id;
        $usuario->email = $request->email;
        //$usuario->password = Hash::make($request->password);

        if($usuario->save()){
            $log = new LogsUsuarioController();
            $log->store($usuario, 'u');
            return redirect()->route('usuarios')->with('success','Editado con éxito');
        }
        return back()->with('fail','No se pudo actualizar el usuario');

    }

    /**
     * Método para editar perfil de usuario
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     */
    public function updateFace(Request $request) {
        $request->validate([
            'usuarioFace' => 'required|unique:users,usuario,'.$request->usuario_id_face,
            'usuario_id_face' => 'required',
            'passwordFace' => 'required',
        ]);
        $usuario = User::find($request->usuario_id_face);
        if(Hash::check($request->passwordFace,$usuario->password)){
            if(isset($request->newPasswordFace)){
                $request->validate([
                    'newPasswordFace' => 'required|min:8',
                    'repetirPasswordFace' => 'required|same:newPasswordFace',
                ]);
                $usuario->password = Hash::make($request->newPasswordFace);
            }
            $usuario->usuario = $request->usuarioFace;

            if($usuario->save()){
                $log = new LogsUsuarioController();
                $log->store($usuario, 'u');
                return back()->with('success','Editado con éxito');
            }
            
        }
        
        else{
            throw ValidationException::withMessages([
                'passwordFace' => 'Contraseña no válida.',
                'failFace' => 'No se pudo actualizar el perfil',
            ]);
        }
        return back()->with('failFace','No se pudo actualizar el usuario');
     

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
            return redirect()->route('usuarios')->with('success','Eliminado con éxito');
        }
        return back()->with('fail','No se pudo eliminar el usuario');
    }
}