<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Trainer extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->hasMany(Course::class, 'trainer', 'name'); // Make sure 'trainer' field in courses matches name
    }
    protected $fillable = ['name','bio','photo'];

    public function sessions() { return $this->hasMany(YogaSession::class); }
    public function availabilities() { return $this->hasMany(Availability::class); }
    //public function bookings() { return $this->hasMany(Booking::class); }
    
}
