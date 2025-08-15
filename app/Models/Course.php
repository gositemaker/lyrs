<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'level',
        'description',
        'type',
        'price',
        'trainer',
        'certification',
        'status',
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(Trainer::class, 'trainer', 'name');
    }

}
