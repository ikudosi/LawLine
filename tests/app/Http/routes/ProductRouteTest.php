<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Models\Product;

class ProductRouteTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    public function test_it_cannot_post_a_product_without_required_fields()
    {
        $request = $this->call('POST', '/api/product', []);

        $this->assertTrue($request->getStatusCode() == 302 || $request->getStatusCode() == 422);
    }

    public function test_it_can_post_a_product_with_required_fields()
    {
        $data = [
            'name'          =>  'FooBarSoap',
            'description'   =>  'Soap',
            'price'         =>  10.00
        ];

        $request = $this->call('POST', '/api/product', $data);

        $this->assertEquals(200, $request->getStatusCode());
        $this->seeInDatabase('products', $data);
    }

    public function test_it_cannot_update_a_product_without_required_fields()
    {
        $product = factory(Product::class)->create([]);

        $request = $this->call('PATCH', "/api/product/{$product->product_id}", []);

        $this->assertTrue($request->getStatusCode() == 302 || $request->getStatusCode() == 422);
    }

    public function test_it_can_update_a_product_with_required_fields()
    {
        $product = factory(Product::class)->create();
        $newData = [
            'product_id'    =>  $product->product_id,
            'name'          =>  'Foobar',
            'description'   =>  'Bars of Foo',
            'price'         =>  500.00
        ];

        $request = $this->call('PATCH', "/api/product/{$product->product_id}", $newData);

        $this->assertEquals(200, $request->getStatusCode());
        $this->seeInDatabase('products', $newData);
    }

    public function test_exception_is_handled_on_update()
    {
        $product = factory(Product::class)->create();
        $targetProductId = $product->product_id + 1;

        $request = $this->call('PATCH', "/api/product/{$targetProductId}", $product->toArray());

        $this->assertEquals(404, $request->getStatusCode());
        $this->seeJsonStructure(['text']);
    }

    public function test_it_can_delete_a_product()
    {
        $product = factory(Product::class)->create([]);

        $this->call('DELETE', "/api/product/{$product->product_id}", []);

        $this->notSeeInDatabase('products', ['product_id' => $product->product_id]);
    }

    public function test_exception_is_handled_on_delete()
    {
        $product = factory(Product::class)->create();
        $targetProductId = $product->product_id + 1;

        $request = $this->call('DELETE', "/api/product/{$targetProductId}", $product->toArray());

        $this->assertEquals(404, $request->getStatusCode());
        $this->seeJsonStructure(['text']);
    }

    public function test_it_can_get_product_info()
    {
        $product = factory(Product::class)->create([]);

        $request = $this->call('GET', "/api/product/{$product->product_id}", []);

        $this->assertEquals(200, $request->getStatusCode());
    }

    public function test_exception_is_handled_on_retrieve()
    {
        $product = factory(Product::class)->create();
        $targetProductId = $product->product_id + 1;

        $request = $this->call('GET', "/api/product/{$targetProductId}");

        $this->assertEquals(404, $request->getStatusCode());
        $this->seeJsonStructure(['text']);
    }

}