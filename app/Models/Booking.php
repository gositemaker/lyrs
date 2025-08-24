<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    //protected $fillable = ['user_id', 'time_slot_id', 'payment_status', 'payment_method', 'razorpay_payment_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function timeSlot() {
        return $this->belongsTo(TimeSlot::class);
    }
    protected $fillable = [
        'yoga_session_id','trainer_id','user_id',
        'date','start_time','end_time','payment_status','payment_method','amount','time_slot_id','status','payment_id','amount'
    ];
   // protected $casts = ['date' => 'date'];

    public function session() { return $this->belongsTo(YogaSession::class, 'yoga_session_id'); }
    public function trainer() { return $this->belongsTo(Trainer::class); }
    protected $casts = [
        'date' => 'date:Y-m-d',  // ensures date comes as 2025-08-21
        'start_time' => 'datetime:H:i:s',
        'end_time'   => 'datetime:H:i:s',
    ];
    
}
