<?php
namespace Awok;

use Cart;

class ShoppingCart
{
	public function add($item) {
    	return Cart::add($item);
	}

	public function content() {
		return Cart::content();
	}

	public function update($rowId, $quantity)
	{
		return Cart::update($rowId, $quantity);
	}

	public function destroy($rowID) {
		return Cart::destroy($rowID);
	}

	public function total()
	{
		return Cart::total();
	}
}