<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'description', 'price', 'image'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, UserProduct::class, 'product_id', 'user_id', 'product_id');
    }

    /**
     * @param $query
     * @param array $ids
     * @return mixed
     */
    public function scopeByIds($query, array $ids)
    {
        return $query->whereIn('product_id', $ids);
    }

    /**
     * @param $query
     * @param array $ids
     * @return mixed
     */
    public function scopeExcludeByIds($query, array $ids)
    {
        return $query->whereNotIn('product_id', $ids);
    }
}
