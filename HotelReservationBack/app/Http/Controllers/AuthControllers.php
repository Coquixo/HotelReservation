<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Error;

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
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
