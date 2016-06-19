<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function show($category, $product)
    {
    	return view('products.show', compact('product'));
    }
}
