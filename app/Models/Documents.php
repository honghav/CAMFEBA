<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $table = 'documents';
    protected $fillable = [
        'title',
        'description',
        'cover',
        'file_path',
        'published_at',
        'status', // free, paid
        'legal_category_id'
    ];
    public function legalCategory()
    {
        return $this->belongsTo(LegalCategory::class, 'legal_category_id');
    }
}
