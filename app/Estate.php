<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $table = 'estates';
    protected $fillable = ['categories_id'];



    public function categories()
    {
        return $this->belongsTo('App\Category', 'foreign_key');
    }
}
