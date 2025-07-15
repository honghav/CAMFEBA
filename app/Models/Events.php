<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Events extends Model
{
    //
    use Hasfactory; 
    protected $table = 'events';
    protected $fillable = 
    [
    'id',
    'title',
    'description',
    'cover',
    'start_date',
    'location',
    'price',
    'start_time',
    'end_time',
    'register_link',
    'end_register'
    ];  

}
