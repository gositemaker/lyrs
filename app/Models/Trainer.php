<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function courses()
    {
        return $this->hasMany(Course::class, 'trainer', 'name'); // Make sure 'trainer' field in courses matches name
    }

    
}
