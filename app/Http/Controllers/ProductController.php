<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function extra()
    {
        $extra = Product::where('is_extra', 1)->get();
        $name = $extra->name;
        $price = $extra->price;
    }
}
