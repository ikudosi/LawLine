<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    /**
     * @var bool
     */
    protected $primaryKey = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id'];

    /**
     * @var bool
     */
    public $timestamps = false;
}