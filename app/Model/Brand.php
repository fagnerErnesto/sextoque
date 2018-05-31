<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $fillable = ['name', 'img_logo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function items()
    {
        return $this->belongsTo('App\Model\Item');
    }

    public function getArrDropDown()
    {
        $arrBrand = self::all();
        $arrDropDow = [];
        foreach ($arrBrand as $brand) {
            $arrDropDow[$brand->id] = $brand->name;
        }
        return $arrDropDow;
    }
}
