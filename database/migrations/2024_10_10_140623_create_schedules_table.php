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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->datetime('departure_time');
            $table->datetime('arrival_time');
            $table->datetime('goes_back');
            $table->datetime('comes_back');
            $table->foreignId('flights_id')
                ->references('id')
                ->on('flights');
            $table->string('condition')->default('várakozik');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
