<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    protected $fillable = [
            'loan_id',
            'book_id',
    ];
    protected $model = 'loan_details';
}
