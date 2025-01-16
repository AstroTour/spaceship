<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\SpaceshipSeat;

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


        //---------------------------------------------------------------------- Odyssey

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 1,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 1,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 1,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3B',
            'spaceship_id' => 1,
            'at_window' => false
        ]);

        // --------------------------------------------------------------- Origin

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 2,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 2,
            'at_window' => false
        ]);


        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 2,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 2,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3B',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3C',
            'spaceship_id' => 2,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3D',
            'spaceship_id' => 2,
            'at_window' => false
        ]);


        //------------------------------------------------------------------ Nova

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 3,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 3,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 3,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 3,
            'at_window' => true
        ]);

        // --------------------------------------------------- Chronos

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 4,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 4,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 4,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3B',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3C',
            'spaceship_id' => 4,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3D',
            'spaceship_id' => 4,
            'at_window' => false
        ]);


        // -------------------------------------------------------------- Phantom

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 5,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 5,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 5,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3B',
            'spaceship_id' => 5,
            'at_window' => false
        ]);

        // ------------------------------------------------------ Spectra

        SpaceshipSeat::create([
            'seat_name' => '1A',
            'spaceship_id' => 6,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1B',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1C',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '1D',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2A',
            'spaceship_id' => 6,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2B',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2C',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '2D',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3A',
            'spaceship_id' => 6,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3B',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3C',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '3D',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '4A',
            'spaceship_id' => 6,
            'at_window' => true
        ]);

        SpaceshipSeat::create([
            'seat_name' => '4B',
            'spaceship_id' => 6,
            'at_window' => false
        ]);

        SpaceshipSeat::create([
            'seat_name' => '4C',
            'spaceship_id' => 6,
            'at_window' => false
        ]);
    }

    /**
     * Reverse the migrations.
     */


    public function down(): void
    {
        Schema::dropIfExists('spaceship_seats');
    }
};
