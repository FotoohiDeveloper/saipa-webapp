<?php

// helper functions
use Illuminate\Support\Facades\Http;

function sendAuthSms($number)
{
    $token = env('PAYAMAK_TOKEN');
        $result = Http::post("https://console.melipayamak.com/api/send/otp/$token", [
            "to" => (string) $number,
        ]);
    dd ($result->json());
}

