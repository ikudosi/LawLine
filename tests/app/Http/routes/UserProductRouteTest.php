<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Product;
use App\Models\User;

class UserProductRouteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_link_product_to_user()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->call('PUT', "/api/user/product/{$product->product_id}", [
            'api_token' =>  $user->api_token
        ]);

        $this->seeInDatabase('user_products', ['user_id' => $user->user_id, 'product_id' => $product->product_id]);
    }

    public function test_it_can_detach_product_from_user()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();
        $user->setProducts([$product->product_id]);

        $this->call('DELETE', "/api/user/product/{$product->product_id}", [
            'api_token' =>  $user->api_token
        ]);

        $this->notSeeInDatabase('user_products', ['user_id' => $user->user_id, 'product_id' => $product->product_id]);
    }
}