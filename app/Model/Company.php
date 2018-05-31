<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
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
        $arrCompany = Company::all();
        $arrDropDow[''] = '';
        foreach ($arrCompany as $company) {
            $arrDropDow[$company->id] = $company->name;
        }
        return $arrDropDow;
    }
}
