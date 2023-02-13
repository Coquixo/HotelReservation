<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                'password' => 'required|string|max:255|min:6'
            ]);

            //En caso de no ser correcto lo que hacemos es devolver una respuesta de success pero con fallo de auth

            if ($validator->fails()) {
                return response([
                    'success' => true,
                    'message' => $validator->messages()
                ], 401);
            }

            $user = User::create([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('password'),
                'password' => bcrypt($request->password)
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user', 'token'), 201);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => $th
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $input = $request->only('email', 'password');
            $jwt_token = null;


            if (!$jwt_token == JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Wrong credentials'
                ], 401);
            }

            return response()->json([
                'success' => true,
                'message' => 'Logged Sucessfully',
                'token' => $jwt_token,
            ]);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => $th
            ], 500);
        }
    }
}
