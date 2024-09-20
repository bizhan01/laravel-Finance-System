<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salesItem extends Model
{
    protected $fillable = ['user_id','sell_id', 'product_id', 'product_qty'];
}
