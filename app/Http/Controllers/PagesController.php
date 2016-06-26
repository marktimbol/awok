<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Item;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$items = Item::latest()->get();
    	return view('pages.home', compact('items'));
    }
}
