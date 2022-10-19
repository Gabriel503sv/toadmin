<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(){
       
        $users = User::all();
        return view('dashboard.Usuario',compact('users'));
    
    }

    public function registerVerify(Request $request){
        
        $request->validate([
            "email" => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ],[
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya ha sido usado',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener 8 caracteres',
            'password_confirmation.required' => 'La confirmacion de la contraseña es requerida',
            'password.same' => 'La contraseñas no coinciden',
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('usuario')->with('success',"Usuario registrado correctamente");
    }

    public function login(){
        return view('auth.login');
    }

    public function loginverify(request $request){
        if(Auth::attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['invalid_credentials'=>'Usuario y contraseña invalida'])->withInput();
    }

    public function signOut(Request $request,Redirect $redirect){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success',"session cerrada correctamente");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()-back()->with('success','Usuario eliminado Correctamente');
    }


    
}
