<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Flight;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number', 10);
            $table->string('to_time')->nullable();
            $table->string('from_time')->nullable();
            $table->unsignedBigInteger('departure_spaceport_id');
            $table->unsignedBigInteger('destination_spaceport_id');
            $table->unsignedBigInteger('spaceship_id');
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
            $table->foreign('spaceship_id')
                ->references('id')
                ->on('spaceships')
                ->onDelete('cascade');
            $table->timestamps();
        });


        Flight::create([
            'flight_number' => 'AD154',
            'to_time' => '~7 hónap',
            'from_time' => '~7 hónap',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 4,
            'spaceship_id' => 2,
        ]);

        Flight::create([
            'flight_number' => 'GH191',
            'to_time' => '~8,5 év',
            'from_time' => '~8,5 év',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 7,
            'spaceship_id' => 5,
        ]);

        Flight::create([
            'flight_number' => 'EX202',
            'to_time' => '~6 év',
            'from_time' => '~6 év',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 5,
            'spaceship_id' => 6,
        ]);
        
        Flight::create([
            'flight_number' => 'CI225',
            'to_time' => '~6,5 év',
            'from_time' => '~6,5 év',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 1,
            'spaceship_id' => 6,
        ]);

        Flight::create([
            'flight_number' => 'MA203',
            'to_time' => '~12 év',
            'from_time' => '~12 év',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 8,
            'spaceship_id' => 5,
        ]);

        Flight::create([
            'flight_number' => 'TT211',
            'to_time' => '~15 hónap',
            'from_time' => '~15 hónap',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 2,
            'spaceship_id' => 1,
        ]);

        Flight::create([
            'flight_number' => 'KK161',
            'to_time' => '~7 év',
            'from_time' => '~7 év',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 6,
            'spaceship_id' => 4,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
