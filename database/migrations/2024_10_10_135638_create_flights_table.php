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
            'to_time' => 'dgpwdngpkwdngwdpwngőwrng',
            'from_time' => 'wdwpwjgőowgőw',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 4,
            'spaceship_id' => 2,
        ]);

        Flight::create([
            'flight_number' => 'AD191',
            'to_time' => 'dgpwdngpkwdngwdpwngőwrngfekfe',
            'from_time' => 'wdwpwjgőowgőwdkcmeő',
            'departure_spaceport_id' => 3,
            'destination_spaceport_id' => 7,
            'spaceship_id' => 5,
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
