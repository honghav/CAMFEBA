<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $table = 'events';
    protected $fillable = 
    [
        'title',
        'description',
        'start_date',
        'lacation',
        'price',
        'cover',
        'sart_time',
        'end_time',
        'register_link',
        'end_register'
    ];
}
