<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];
    protected $model = 'book_shelves';
}
