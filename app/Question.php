<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
