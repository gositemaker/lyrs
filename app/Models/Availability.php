<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = ['trainer_id','date','start_time','end_time'];
  //  protected $casts = ['date' => 'date'];
    protected $casts = [
        'date' => 'date:Y-m-d',  // ensures date comes as 2025-08-21
        'start_time' => 'datetime:H:i:s',
        'end_time'   => 'datetime:H:i:s',
    ];
    
    public function trainer() { return $this->belongsTo(Trainer::class); }
}
