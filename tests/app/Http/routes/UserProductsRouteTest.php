<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Product;
use App\Models\User;

class UserProductsRouteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_retrieve_all_products_by_authorized_user()
    {
        $user = factory(User::class)->create();
        $products = factory(Product::class)->times(5)->create();
        $productIds = $products->pluck('product_id')->toArray();
        $user->setProducts($productIds);

        $this->actingAs($user);
        $this->call('GET', '/api/user/products', [
            'api_token' =>  $user->api_token
        ]);

        $this->assertEquals(5, Product::byIds($productIds)->get()->count());
    }
}