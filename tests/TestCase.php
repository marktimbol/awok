<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function createItem($options=[])
    {
        return factory(App\Item::class)->create($options);
    }

    public function createCategory($options=[])
    {
        return factory(App\Category::class)->create($options);
    }

    public function addToCart($item, $quantity=1)
    {
        // $this->call('POST', '/cart' , [
        //     'product_id'    => $product->id
        // ]);   
        \Cart::add([
            'id'    => $item->id,
            'name'  => $item->name,
            'qty'   => $quantity,
            'price' => $item->price,
            'options' => [
                'item'   => $item
            ]
        ]);
    }
}
