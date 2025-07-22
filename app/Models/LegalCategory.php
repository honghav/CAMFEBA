<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalCategory extends Model
{
    //
    protected $table = 'legal_categories';
    protected $fillable = [
        'name',
        'description',
        'cover',
    ];
    public function documents()
    {
        return $this->hasMany(Documents::class, 'legal_category_id');
    }

}
