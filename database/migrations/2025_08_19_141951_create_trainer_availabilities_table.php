<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('trainer_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('trainers')->cascadeOnDelete(); // your trainers live in users
            $table->timestamp('start')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('end')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->unsignedInteger('capacity')->default(1); // optional: how many parallel bookings allowed
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->index(['trainer_id', 'start', 'end']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('trainer_availabilities');
    }
};
