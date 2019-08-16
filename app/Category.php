<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table='category';
    protected $fillable=['name'];
    protected $primaryKey = 'id';

    public function getsubcategory()
    {
        return $this->hasMany('App\Subcategory','subid');
    }

    public function getproduct()
    {
        return $this->hasMany('App\product','productid');
    }
}
