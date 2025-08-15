<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class YogaSession extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category','category_id', 'price', 'duration', 'description', 'trainer_id'];

    // public function trainer() {
    //     return $this->belongsTo(User::class, 'trainer_id');
    // }

    public function timeSlots() {
        return $this->hasMany(TimeSlot::class);
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
    public function category()
    {
        return $this->belongsTo(YogaCategory::class);
    }
    
    
}

