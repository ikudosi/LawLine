<?php

use App\Models\Product;

class UserModelTest extends TestCase
{
    public function test_product_relationship()
    {
        $product = factory(Product::class)->create([]);
        $user = $product->user;

        $this->assertTrue(!empty($user->products));
    }
}