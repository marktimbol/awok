<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CartTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_adds_an_item_in_the_cart()
    {
    	$category = $this->createCategory();
    	$item = $this->createItem();
    	$item->addCategory($category);

    	$this->addToCart($item);
    }

    public function test_it_removes_an_item_from_the_cart()
    {
        $item = $this->createItem();
        $this->addToCart($item);

        $this->visit('/cart')
            ->press('Remove');
    }

    public function test_it_updates_the_quantity_of_an_item()
    {
        $item = $this->createItem([
            'price' => '5'
        ]);
        $this->addToCart($item);

        $this->visit('/cart')
            ->type('5', 'quantity')
            ->press('Update');
    }

    public function test_it_display_all_the_items_in_the_cart()
    {
        $item = $this->createItem();
        $this->addToCart($item);

        $this->visit('/cart')
            ->see($item->name);
    }

    public function test_it_displays_the_total_amount_of_the_items()
    {
        $item = $this->createItem([
            'price' => '5'
        ]);

        $item2 = $this->createItem([
            'price' => '10'
        ]);

        $this->addToCart($item);
        $this->addToCart($item2);

        $this->visit('/cart')
            ->see('Total: AED 15.00');
    }
}
