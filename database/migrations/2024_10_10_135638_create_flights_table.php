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
            $table->foreignId('spaceship_id')->references('id')->on('spaceships')->index();
            $table->unsignedBigInteger('departure_spaceport_id');
            $table->unsignedBigInteger('destination_spaceport_id');
            $table->foreign('departure_spaceport_id', 'fk_departure_spaceport')
                ->references('id')
                ->on('spaceports')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign('destination_spaceport_id', 'fk_destination_spaceport')
                ->references('id')
                ->on('spaceports')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
