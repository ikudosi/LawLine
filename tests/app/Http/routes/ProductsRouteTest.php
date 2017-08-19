<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Models\User;
use App\Models\Product;

class ProductsRouteTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    public function test_it_cannot_post_a_product_without_required_fields()
    {
        $request = $this->call('POST', '/api/products', []);

        $this->assertTrue($request->getStatusCode() == 302 || $request->getStatusCode() == 422);
    }

    public function test_it_can_post_a_product_with_required_fields()
    {
        $data = [
            'name'          =>  'FooBarSoap',
            'description'   =>  'Soap',
            'price'         =>  10.00
        ];

        $request = $this->call('POST', '/api/products', $data);

        $this->assertEquals(200, $request->getStatusCode());
        $this->seeInDatabase('products', $data);
    }

    public function test_it_cannot_update_a_product_without_required_fields()
    {
        $product = factory(Product::class)->create([]);

        $request = $this->call('PATCH', "/api/products/{$product->product_id}", []);

        $this->assertTrue($request->getStatusCode() == 302 || $request->getStatusCode() == 422);
    }

    public function test_it_can_update_a_product_with_required_fields()
    {
        $product = factory(Product::class)->create();
        $newData = [
            'product_id'    =>  $product->product_id,
            'user_id'       =>  $product->user->user_id,
            'name'          =>  'Foobar',
            'description'   =>  'Bars of Foo',
            'price'         =>  500.00
        ];

        $request = $this->call('PATCH', "/api/products/{$product->product_id}", $newData);

        $this->assertEquals(200, $request->getStatusCode());
        $this->seeInDatabase('products', $newData);
    }
}