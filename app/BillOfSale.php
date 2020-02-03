<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillOfSale extends Model
{
//    use SoftDeletes;

    protected $table = 'bill_of_sales';
    protected $fillable = ['billNumber', 'OnlineAcessCode', 'totalValue', 'billCopyPath', 'billPhotoPath'];
}
