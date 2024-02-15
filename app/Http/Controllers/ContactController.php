<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'phone_number' => 'numeric|required',
            'email' => 'email|required',
            'message' => 'string|required',
        ]);

        
    }
}
