<?php

namespace App\Http\Controllers\Api\Rh;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro de usuarios recuperados exitosamente',
            'data'      => $usuarios
        ], 200);
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);*/

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Registro creado exitosamente',
            'data'      => $user
        ], 201);
    }

    public function ingresar(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status"       => true,
                    "message"      => "Usuario Identificado Correctamente",
                    "access_token" => $token
                ]);
            } else {
                return response()->json([
                    "status"  => false,
                    "message" => "La password es incorrecta",
                ], 204);
            }
        } else {
            return response()->json([
                "status"   => true,
                "message"  => "Usuario no registrado",
            ], 204);
        }
    }

    public function salir(Request $request)
    {
        
        // $request->user()->token()->revoke();
        // $request->user()->currentAccessToken()->delete();
        //return response()->json(null, 200);
        /* auth()->user()->tokens()->delete();
        return response()->json([
            "status" => true,
            "msg" => "Cierre de Sesión",
        ]);*/
    }
}
