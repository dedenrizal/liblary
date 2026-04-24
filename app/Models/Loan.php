<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_npm',
        'loan_at',
        'return_at',
        'user_npm'
    ];
}
