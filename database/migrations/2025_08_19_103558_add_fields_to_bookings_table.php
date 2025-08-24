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
        Schema::table('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('yoga_session_id')->constrained()->onDelete('cascade');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('payment_id')->nullable();
            $table->foreignId('trainer_id')->constrained('trainers')->cascadeOnDelete();

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            // set to 'paid' after gateway
            $table->decimal('amount', 10, 2);
            $table->String('status')->default('confirmed');
            $table->index(['trainer_id','date']);
            $table->index(['yoga_session_id','date']);
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
