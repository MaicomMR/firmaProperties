<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailingListModel extends Model
{
    use SoftDeletes;

    protected  $table = 'mailing_list';
    protected $fillable = ['name', 'email', 'alertAboveValues', 'monthReports'];
}
