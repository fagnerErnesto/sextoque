<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'brand_id', 'img_logo'];
    protected $table = 'item';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemValue()
    {
        return $this->hasMany('App\Model\ItemValue');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Model\Brand');
    }
}
