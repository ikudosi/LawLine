<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Models\Product;

class ProductsRouteTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function test_it_retrieves_all_products()
    {
        factory(Product::class)->create();
        factory(Product::class)->create();
        factory(Product::class)->create();

        $request = $this->call('GET', '/api/products');

        $this->assertTrue(count(json_decode($request->getContent())) == 3);
    }
}