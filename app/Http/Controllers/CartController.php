<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Item;
use Awok\ShoppingCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
	protected $cart;

	public function __construct(ShoppingCart $cart)
	{
		$this->cart = $cart;
	}

    public function index()
    {
        $items = $this->cart->content();
        $total = $this->cart->total();
        return view('cart.index', compact('items', 'total'));
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
    	$product = Item::findOrFail($request->product_id);

    	$this->cart->add([
    		'id'	=> $product->id,
    		'name'	=> $product->name,
    		'qty'	=> $request->quantity,
    		'price'	=> $product->price,
    		'options' => [
    			'product'	=> $product
    		]
    	]);

        flash()->success('Item was added into your cart.');
        return redirect()->back();
    }

    public function update(Request $request, $rowID)
    {
        $this->cart->update($rowID, $request->quantity); 
        return redirect()->route('cart.index');
    }

    public function destroy($rowID)
    {
        $this->cart->destroy($rowID);
        return redirect()->route('cart.index');
    }
}
