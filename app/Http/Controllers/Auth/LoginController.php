<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{

    public function index(){
        if(Auth::check()){
            return redirect('pagina-principal');
        }
        return view('auth.login');
    }

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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
