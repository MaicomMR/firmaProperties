<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstateModel extends Model
{

    protected $table = 'estates';
    protected $fillable = ['categories_id', 'label_id'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'sub_categories_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

}
