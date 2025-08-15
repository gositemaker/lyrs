<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            $table->foreignId('trainer_id')->constrained('users')->onDelete('cascade');
            // Prevent same trainer from being double booked
             $table->unique(['trainer_id', 'date', 'start_time'], 'unique_trainer_slot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            //
        });
    }
};
