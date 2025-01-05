<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'name',
        'railway_id',
    ];

    public function railway()
    {
        return $this->belongsTo(Railway::class);
    }
}
