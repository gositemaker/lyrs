<?php

// database/migrations/2025_08_19_000001_create_availabilities_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('trainers')->cascadeOnDelete();
            $table->date('date');
            $table->time('start_time');   // window start (e.g. 12:00)
            $table->time('end_time');     // window end   (e.g. 20:00)
            $table->timestamps();

            $table->unique(['trainer_id', 'date', 'start_time', 'end_time'], 'uniq_trainer_date_range');
        });
    }
    public function down(): void {
        Schema::dropIfExists('availabilities');
    }
};

