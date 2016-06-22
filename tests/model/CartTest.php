<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_adds_an_item_in_the_cart()
    {
    	$category = $this->newCategory();
    	$product = $this->newProduct();
    	$product->addCategory($category);

    	$this->addToCart($product);
    }

    public function test_it_removes_an_item_from_the_cart()
    {
        $product = $this->newProduct();
        $this->addToCart($product);

        $this->visit('/cart')
            ->press('Remove');
    }

    public function test_it_updates_the_quantity_of_an_item()
    {
        $product = $this->newProduct([
            'price' => '5'
        ]);
        $this->addToCart($product);

        $this->visit('/cart')
            ->type('5', 'quantity')
            ->press('Update');
    }

    public function test_it_display_all_the_items_in_the_cart()
    {
        $product = $this->newProduct();
        $this->addToCart($product);

        $this->visit('/cart')
            ->see($product->name);
    }

    public function test_it_displays_the_total_amount_of_the_items()
    {
        $product = $this->newProduct([
            'price' => '5'
        ]);

        $product2 = $this->newProduct([
            'price' => '10'
        ]);

        $this->addToCart($product);
        $this->addToCart($product2);

        $this->visit('/cart')
            ->see('Total: AED 15.00');
    }
}
