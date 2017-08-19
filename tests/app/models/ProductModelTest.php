<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;
use App\Models\Product;

class ProductModelTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_relationship()
    {
        factory(User::class)->times(2)->create();
        factory(Product::class)->times(2)->create([]);

        $products = Product::all();

        User::all()->each(function ($user) use ($products) {
            $user->setProducts($products);
        });

        $this->assertTrue(Product::with('users')->get()->pluck('users')->count() >= 2);
    }
}