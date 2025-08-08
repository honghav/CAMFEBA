<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technicals extends Model
{
    //
    protected $table = 'technicals';
    protected $fillable = [
        'name',
        'description',
        'type',
        'file_path',
        'category_page',
    ];

    public function documents()
    {
        return $this->hasMany(Documents::class, 'technical_id');
    }
}
