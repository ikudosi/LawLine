<?php

use App\Models\Product;

class ProductModelTest extends TestCase
{
    public function test_user_relationship()
    {
        $product = factory(Product::class)->create([]);

        $this->assertTrue(!empty($product->user));
    }
}