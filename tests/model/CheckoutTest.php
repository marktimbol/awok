<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CheckoutTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_navigates_to_checkout_page()
    {
        $product = $this->newProduct();
        $this->addToCart($product);
        
        $this->visit('/cart')
            ->click('Checkout')
            ->seePageIs('/checkout');
    }
}
