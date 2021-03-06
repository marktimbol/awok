<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
    public function index()
    {
    	return view('cart.checkout');
    }

    public function store(Request $request)
    {
    	$user = User::create($request->all());
    	
    	// charge the user for $9
    	$user->charge(900, [
    		'source' => $request->stripeToken,
    		'receipt_email' => $user->email,
    		'description'  => $user->name . ' payment.'
    	]);

    	flash()->success('You have successfully paid the amount.');
    	return redirect()->route('home');
    }
}
