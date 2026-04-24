<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retrun extends Model
{
    protected $fillable = [
        'loan_detail_id',
        'charge',
        'amount'
    ];
    protected $model = 'return';
}
