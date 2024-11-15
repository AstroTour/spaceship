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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number', 100);
            $table->unsignedBigInteger('spaceship_id')->index();
            $table->unsignedTinyInteger('departure_spaceport_id')->index();
            $table->unsignedBigInteger('destination_spaceport_id')->index();
            $table->timestamp('departure_time')->index();
            $table->timestamp('arrival_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
