<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillOfSale extends Model
{
    use SoftDeletes;

    protected $table = 'bill_of_sales';
    protected $fillable = ['billNumber', 'OnlineAcessCode', 'totalValue', 'billPDFPath', 'billPhotoPath', 'seller_id'];

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }
}
