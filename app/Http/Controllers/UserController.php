<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\TokenResource;
use Carbon\Carbon;
use App\Models\PhoneVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        return new ShowUserResource($user);
    }

    public function update(Request $request)
    {
        $id = $request->user()->id;
        $data = $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$id",
        ]);

        $user = $request->user();
        $user->update($data);

        return new SuccessResource([
            'status_code' => 200,
            'success_code' => 4,
            'message' => 'پروفایل شما با موفقیت آپدیت شد'
        ]);
    }

    public function sendCode(Request $request)
    {
        $user = $request->user();

        if (isset($user->phone_number)) {
            return new ErrorResource([
                'status_code' => 400,
                'error_code' => 281,
                'message' => 'شما یک بار شماره خود را ثبت کردید'
            ]);
        }

        $data = $request->validate([
            'phone_number' => 'numeric|required|unique:users,phone_number'
        ]);

        $lastCodeSent = PhoneVerify::where('user_id', $user->id)->latest()->first();

        if ($lastCodeSent) {
            $currentTime = Carbon::now();
            $lastSentTime = Carbon::parse($lastCodeSent->created_at);

            if ($currentTime->diffInMinutes($lastSentTime) < 2) {
                return new ErrorResource([
                    'status_code' => 400,
                    'error_code' => 888,
                    'message' => 'شما تا دو دقیقه آینده نمی‌توانید کد جدید درخواست کنید'
                ]);
            }
        }

        $payamak_token = env('PAYAMAK_TOKEN');

        $response = Http::post("https://console.melipayamak.com/api/send/otp/$payamak_token", [
            "to" => (string) $data['phone_number'],
        ]);

        if ($response->successful()) {
            $result = $response->json();
            $token = Str::random(60);
            $query = PhoneVerify::create([
                "user_id" => $user->id,
                "token" => $token,
                "phone_number" => $data["phone_number"],
                "code" => $result['code'],
            ]);

            if ($query) {
                return new TokenResource($query);
            }
        }

        return new ErrorResource([
            'status_code' => 400,
            'error_code' => 987,
            "message" => 'خطای ناشناخته ای رخ داد'
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $user = $request->user();

        if (isset($user->phone_number)) {
            return new ErrorResource([
                'status_code' => 400,
                'error_code' => 281,
                'message' => 'شما یک بار شماره خود را ثبت کردید'
            ]);
        }

        $data = $request->validate([
            'token' => 'required|string',
            'code' => 'numeric|required',
        ]);

        $token = PhoneVerify::where(['token' => $data['token'], 'status' => 0])->first();

        if ($token) {
            $tokenCreationTime = Carbon::parse($token->created_at);
            $currentTime = Carbon::now();

            if ($currentTime->diffInMinutes($tokenCreationTime) > 2) {
                $token->status = 1;
                $token->save();
                return new ErrorResource([
                    'status_code' => 400,
                    'error_code' => 947,
                    'message' => 'توکن منقضی شده است'
                ]);
            }


            if ($token->code == $data['code']) {
                $status = $user->update(['phone_number' => $token->phone_number]);
                if ($status) {
                    $token->status = 2;
                    $token->save();
                    return new SuccessResource([
                        'status_code' => 200,
                        'success_code' => 365,
                        'message' => 'شماره شما با موفقیت افزوده شد'
                    ]);
                }
            }

            $token->status = 1;
            $token->save();

            return new ErrorResource([
                'status_code' => 400,
                'error_code' => 946,
                'message' => 'کد وارد شده اشتباه است'
            ]);
        }

        return new ErrorResource([
            'status_code' => 400,
            'error_code' => 223,
            'message' => 'توکن یافت نشد'
        ]);
    }
}
