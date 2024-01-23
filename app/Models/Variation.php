<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table='variation';
    protected $fillable=['item_id','product_price','sale_price','variation','available_qty'];

}