<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'client', 'idCategory', 'idStorage', 'cant', 'total',
    ];
}
