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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('duration');
            $table->String('level');
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('trainer')->nullable();
            $table->boolean('certification')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
