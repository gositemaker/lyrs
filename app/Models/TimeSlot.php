<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['yoga_session_id', 'date', 'start_time', 'end_time', 'trainer_id'];

    public function yogaSession() {
        return $this->belongsTo(YogaSession::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}

