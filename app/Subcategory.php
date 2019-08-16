<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $table='subcategory';
    protected $fillable=['subname','catid'];
    protected $primaryKey = 'subid';
    
    public function getcategory()
    {
    	return $this->belongsTo('App\Category','catid');
    }

    public function getsubcategory()
    {
        return $this->hasMany('App\Subcategory','subid');
    }
    public function getproduct()
    {
        return $this->hasMany('App\product','productid');
    }

}
