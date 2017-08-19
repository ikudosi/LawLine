<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'api_token'
    ];

    /***
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'user_products');
    }

    public function userProducts()
    {
        return $this->hasMany(UserProduct::class);
    }

    /**
     * @param EloquentCollection|Product $products
     * @return array
     */
    public function setProducts($products)
    {
        return $this->products()->sync($products);
    }
}
