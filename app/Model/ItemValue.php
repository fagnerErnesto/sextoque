<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemValue extends Model
{
    protected $fillable = ['item_id', 'buy_price', 'sell_price', 'quantity', 'in_active'];
    protected $table = 'item_value';
}
