<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_shows_products_on_the_homepage()
    {
    	$item = $this->createItem();
    	$this->visit('/')
    		->see($item->name);
    }
}
