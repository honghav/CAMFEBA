<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretariat extends Model
{
    //
    protected $table = 'secretariats';
    protected $fillable = [
        'name',
        'description',
        'role',
        'proflie',
        'phone_number',
        'email',
        'address',
    ];
}
