<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'payment_id', 'payment_method', 'amount', 'courses', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
