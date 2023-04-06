<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

/**
 * Controller de Login: brinda acceso a los servicios de logueo.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @version 1.0
 * @since 11/12/2022
 */
class LoginController extends Controller
{

    public function index(){
        if(Auth::check()){
            return redirect('pagina-principal');
        }
        return view('auth.login');
    }

    /**
     * @OA\Post(
     * path="/login",
     * summary="Iniciar sesión en el sistema",
     * description="Logueo mediante email y password",
     * operationId="authLogin",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Credenciales del ususario",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="usuario"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *       @OA\Property(property="remember", type="boolean", example="true"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Credencial válida",       
     *    @OA\JsonContent(
     *      @OA\Property(property="message"), type="string", example="Usuario válido."
     *      )
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Error en la credencial",
     *    @OA\JsonContent(
     *       @OA\Property(property="message"), type="string", example="Usuario no válido."
     *        )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        $remember = ($request->has('remember') ? true : false);

        if(!User::where('usuario',$request->usuario)->exists()){
            throw ValidationException::withMessages([
                'usuario' => 'Usuario no valido.',
            ]);
        }
        if(Auth::attempt($request->only('usuario','password'),$remember)){
            $request->session()->regenerate();
            return redirect()->intended('pagina-principal');
        }
        throw ValidationException::withMessages([
            'password' => 'Contraseña no valida.',
        ]);
    }
    /**
    * @OA\Post(
    * path="/loguot",
    * summary="Terminar sesión en el sistema",
    * description="Salir del sistema.",
    * operationId="authLogout",
    * tags={"auth"},
    * @OA\Response(
    *    response=200,
    *    description="Sesión terminada",       
    *    @OA\JsonContent(
    *      @OA\Property(property="message"), type="string", example="Sesión terminada."
    *      )
    * ),
    *)
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
