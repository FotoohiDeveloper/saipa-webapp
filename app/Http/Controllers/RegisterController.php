<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if ($user) {
            $token = $user->createToken('token_base_name')->plainTextToken;
            return new UserCollection([
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'role' => ($user->role == 1) ? 'ادمین' : 'کاربر ساده',
                'token' => $token
            ]);
        }

        return new ErrorResource([
            'status_code' => 400,
            'error_code' => 5,
            'message' => 'ارور ناشناخته'
        ]);
    }
}
