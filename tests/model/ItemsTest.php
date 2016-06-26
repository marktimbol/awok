<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemsTest extends TestCase
{
	use DatabaseMigrations;

	public function test_it_adds_a_category_to_a_product()
	{
    	$category = $this->createCategory();
    	$item = $this->createItem();
    	$item->addCategory($category);

    	$this->seeInDatabase('item_categories', [
    		'category_id'	=> $category->id,
    		'item_id'	=> $item->id
    	]);
	}

    public function test_it_displays_a_single_product()
    {
    	$category = $this->createCategory();
    	$item = $this->createItem();
    	$item->addCategory($category);

    	$this->visit('/items/'.$item->slug)
    		->see($item->name);
    }
}
