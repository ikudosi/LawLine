<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductsRouteTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    public function test_it_cannot_post_a_product_without_required_fields()
    {
        $request = $this->call('POST', '/api/products', []);
        $this->assertEquals(302, $request->getStatusCode());
    }

    public function test_it_can_post_a_product_with_required_fields()
    {
        $request = $this->call('POST', '/api/products', [
            'name'          =>  'FooBarSoap',
            'description'   =>  'Soap',
            'price'         =>  10.00
        ]);
        $this->assertEquals(200, $request->getStatusCode());
    }
}