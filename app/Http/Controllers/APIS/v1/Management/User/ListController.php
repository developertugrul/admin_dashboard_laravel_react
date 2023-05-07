<?php

namespace App\Http\Controllers\APIS\v1\Management\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // List all user data
    public function list(Request $request)
    {
        $user_list = User::all();
        return response()->json([
            "status" => "success",
            "data" => $user_list
        ], 200);
    }
}
