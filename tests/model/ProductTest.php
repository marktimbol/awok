<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
	use DatabaseMigrations;

	public function test_it_adds_a_category_to_a_product()
	{
    	$category = factory(App\Category::class)->create();
    	$product = factory(App\Product::class)->create();
    	$product->addCategory($category);

    	$this->seeInDatabase('product_categories', [
    		'category_id'	=> $category->id,
    		'product_id'	=> $product->id
    	]);
	}

    public function test_it_displays_a_single_product()
    {
    	$category = factory(App\Category::class)->create();
    	$product = factory(App\Product::class)->create();
    	$product->addCategory($category);

    	$this->visit('/categories/'.$category->id.'/products/'.$product->id)
    		->see($product->name);
    }
}
