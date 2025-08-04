<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submember extends Model
{
    //
    protected $table = 'submembers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image',
        'is_active',
        'user_id',
    ];
    
}
