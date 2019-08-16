<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table='product';
    protected $fillable=['productname','catid','subcatid'];
    protected $primaryKey = 'productid';
    
    public function getcategory()
    {
    	return $this->belongsTo('App\Category','catid');
    }
    
    public function getsubcategory()
    {
        return $this->belongsTo('App\Subcategory','subcatid');
    }

    public function getproduct()
    {
        return $this->hasMany('App\product','productid');
    }
}
