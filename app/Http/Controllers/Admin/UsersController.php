<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function getUsers(){

        return response()->json([
            'status' => 1,
            'users' => User::query()
                ->orderBy('updated_at', 'desc')
                ->get()
        ]);
    }
}
