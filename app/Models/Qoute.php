<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qoute extends Model
{
    //
    protected $table = 'qoutes';
    protected $fillable = [
        'name',
        'file_path',
        'description',
        'from',
    ];
}
