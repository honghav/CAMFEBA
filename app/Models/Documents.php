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
        'type',
        'status', // free, paid
        'technical_id'
    ];
    protected $casts = [
        'published_at' => 'datetime'
    ];
    public function legalCategory()
    {
        return $this->belongsTo(Technicals::class,);
    }
}
