<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layouts extends Model
{
    //
    protected $table = 'layouts';  
    protected $fillable = [
        'name',
        'description',
        'type',
        'file_path',
    ];

}
