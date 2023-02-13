<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = DB::table('users')->get();

            return response()->json([
                "success" => true,
                "message" => "Bringing users data successful",
                "data" => $users
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 400);
        }
    }
}
