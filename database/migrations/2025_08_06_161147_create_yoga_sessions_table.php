<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('yoga_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('duration'); // e.g., "60 minutes"
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('trainer_id')->constrained('trainers')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yoga_sessions');
    }
};
