<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;
use App\Models\Product;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;

    public function test_product_relationship()
    {
        $user = factory(User::class)->create();
        factory(Product::class)->times(1)->create([]);

        $user->setProducts(Product::all());

        $this->assertTrue(!empty($user->products));
    }
}