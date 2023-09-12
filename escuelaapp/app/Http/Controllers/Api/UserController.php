<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'usernom' => 'required|unique:usuarios',
            'nombres' => 'required',
            'email' => 'required|email|unique:usuarios',
            'rol_id' => 'required',
            'password' => 'required|min:6|confirmed',
            //'password_confirmation'
        ]);

        $user = new Usuario();
        $user->usernom = $request->usernom;
        $user->nombres = $request->nombres;
        $user->rol_id = $request->rol_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            "status" => 1,
            "mensaje" => "Registro de usuario exitoso"
        ],201);
    }

    public function login(Request $request)
    {
       $request->validate([
        "usernom" =>"required",
        "password" =>"required|min:6"
       ]);

       $user = Usuario::where("usernom","=",$request->usernom)->first();
       if(isset($user->id))
       {
          if(hash::check($request->password,$user->password))
          {
             //Creamos token
             $token = $user->createToken('auth_token')->plainTextToken;
             return response()->json([
                'status' => 1,
                'mensaje'=> "Usuario Logueado.",
                'data' =>$user,
                'acces_token' => $token
             ]);
          }
          else
          {
            return response()->json([
                'status' => 0,
                'mensaje'=> "Password Incorrecto."
            ],404);
          }
       }
       else
       {
            return response()->json([
                'status' => 0,
                'mensaje'=> "Usuario Invalido."
            ],404);
       }
    }

    public function userProfile()
    {
        return response()->json([
            'status' => 1,
            'mensaje'=> "Acerca del Perfil de usuario",
            'data' => auth()->user() 
         ],Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 1,
            'mensaje'=> "Cierre de sesion"
         ]);

    }
}
