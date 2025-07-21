<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    //
    protected $table = 'member_details';
    protected $fillable = [
        'company_name',
        'logo',
        'link',
        'address',
        'phone',
        'status',
        'payment_date',
        'expire_date',
        'industry',
        'user_id'
    ];
}
