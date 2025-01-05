<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Railway extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }

    public function getRatingAttribute()
    {
        return $this->hasMany(Feedback::class)->avg('rating');
    }
}
