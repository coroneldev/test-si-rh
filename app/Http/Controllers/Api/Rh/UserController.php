<?php

namespace App\Http\Controllers\Api\Rh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => true,
            "msg" => "¡Registro de usuario exitoso!",
        ]);
    }

    public function login(Request $request)
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
                    "status" => true,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "La password es incorrecta",
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ], 404);
        }
    }

    public function recursos()
    {
        return response()->json([
            "status" => true,
            "msg" => "ya puedes acceder a los servicios del sistema pero no estas categorizado",
            //"data" => auth()->user()
        ]);
    }

   /* public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => true,
            "msg" => "Cierre de Sesión",
        ]);
    }*/

}
