<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        'active' => 'boolean'
    ];

    protected $fillable = [
        'active',
        'content',
        'dimension_id',
    ];

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
