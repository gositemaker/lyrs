<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerAvailability extends Model
{
    protected $fillable = ['trainer_id', 'start', 'end', 'capacity', 'notes'];
    protected $casts = ['start' => 'datetime', 'end' => 'datetime'];

    public function trainer() {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
