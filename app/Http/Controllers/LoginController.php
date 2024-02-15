<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use DragonCode\Support\Concerns\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user)
        {
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
            'error_code' => 004,
            'status_code' => 400,
            'message' => 'اطلاعات نادرست میباشد'
        ]);
    }

    public function show (){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($data = $request->all(), [
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        if ($validate->failed()){
            $message = $validate->getMessageBag();
            return redirect()->back()->with('errors', $message);
        }

        $auth = Auth::attempt($data);

        if ($auth) {
            return redirect()->route('login');
        }
    }
}
