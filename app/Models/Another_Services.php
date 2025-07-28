<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Another_Services extends Model
{
    //
    protected $table = 'another_services';
    protected $fillable = [
        'name',
        'description',
        'type', 
        'file_path',
    ];
}
