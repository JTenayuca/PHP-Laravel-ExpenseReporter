<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expense_reports extends Model
{
    //
    protected $fillable = [
        'report_name',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function expense_items()
    {
        return $this->hasMany('App\expense_items');
    }

}
