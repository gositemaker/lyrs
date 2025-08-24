<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class YogaSession extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category','image','category_id', 'price', 'duration', 'description', 'trainer_id'];

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

    public function durationMinutes(): int
    {
        if (preg_match('/(\d+)/', (string)$this->duration, $m)) {
            return (int)$m[1];
        }
        return 60;
    }
    // public function category()
    // {
    //     return $this->belongsTo(YogaCategory::class);
    // }
    public function category()
    {
        return $this->belongsTo(YogaCategory::class);
    }

   // public function trainer() { return $this->belongsTo(Trainer::class); }
    public function bookings() { return $this->hasMany(Booking::class); }
    
}

