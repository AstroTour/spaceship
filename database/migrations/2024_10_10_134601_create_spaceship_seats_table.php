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
        Schema::create('spaceship_seats', function (Blueprint $table) {
            $table->primary(['seat_name', 'spaceship_id']);
            $table->string('seat_name');
            $table->foreignId('spaceship_id')
                ->constrained('spaceships')
                ->onDelete('cascade');
            $table->boolean('at_window');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaceship_seats');
    }
};
