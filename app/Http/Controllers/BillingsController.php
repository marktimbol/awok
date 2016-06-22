<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BillingsController extends Controller
{
    public function index()
    {
    	return view('cart.checkout');
    }
}
