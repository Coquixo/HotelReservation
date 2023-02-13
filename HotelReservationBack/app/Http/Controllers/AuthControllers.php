<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthControllers extends Controller
{

    public function register(Request $request)
    {
        try {

            //Primero compobamos que el body que recibimos sea correcto

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users',
                'password' => 'required|string|max:255|min:6',
            ]);

            //En caso de no ser correcto lo que hacemos es devolver una respuesta de success pero con fallo de auth

            if ($validator->fails()) {
                return response([
                    'success' => true,
                    'message' => $validator->messages(),
                ], 401);
            }

            User::create([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->password),
                'age' => $request->get('age'),
                "phone" => $request->get('phone')
            ]);

            return response()->json([
                "success" => true,
                "message" => "Registered successfully"
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => $th,

            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $jwt_token = null;

            if (!$jwt_token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 403);
            }

            return response()->json([
                'success' => true,
                "message" => "logged in successfully",
                'token' => $jwt_token,
            ]);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => $th,

            ], 500);
        }
    }
}
