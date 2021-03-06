<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'description'];

    public function getRouteKeyName() { return 'slug'; }
    
    public function addCategory($category)
    {
    	return $this->categories()->attach($category->id);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class, 'item_categories');
    }
}
