<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Cart.php
class Cart extends Model {
    protected $fillable = ['user_id', 'course_id'];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
