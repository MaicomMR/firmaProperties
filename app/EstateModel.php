<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstateModel extends Model
{

    protected $table = 'estates';
    protected $fillable = ['categories_id', 'label_id'];

    public function category()
    {
        return $this->hasMany('App\Category', 'id');
    }

    public function subcategory()
    {
        return $this->hasMany('App\SubCategory', 'id');
    }

    public function seller()
    {
        return $this->hasMany('App\Seller', 'id');
    }

}
