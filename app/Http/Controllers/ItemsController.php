<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function show($item)
    {
    	$relatedItems = Item::take(5)->get();
    	return view('items.show', compact('item', 'relatedItems'));
    }
}
