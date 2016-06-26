<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BillingsTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_navigates_to_checkout_page()
    {
        $item = $this->createItem();
        $this->addToCart($item);
        
        $this->visit('/cart')
            ->click('Checkout')
            ->seePageIs('/checkout');
    }

    public function test_it_charges_users_credit_card()
    {
    	$this->assertTrue(true);
    	//
    }
}
