<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expense_items extends Model
{
    //
    protected $fillable = [
        'item', 'vendor', 'amount', 'notes'
    ];

    public function expense_reports()
    {
        return $this->belongsTo('App\expense_reports');
    }
}
