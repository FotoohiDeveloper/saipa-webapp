<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    // public function sendAuthCode($number)
    // {
    //     $token = env('PAYAMAK_TOKEN');
    //     $result = Http::post("https://console.melipayamak.com/api/send/otp/$token", [
    //         "to" => (string) $number,
    //     ]);

    //     dd ($result->json());
    // }
}
