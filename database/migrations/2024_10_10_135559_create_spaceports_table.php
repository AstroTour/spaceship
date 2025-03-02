<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Spaceport;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spaceports', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->foreignId('planet_id')->references('id')->on('planets');
            $table->timestamps();
        });

        Spaceport::create([
            'name' => 'Nyx',
            'planet_id' => 1
        ]);

        Spaceport::create([
            'name' => 'Helios',
            'planet_id' => 2
        ]);

        Spaceport::create([
            'name' => 'Orion',
            'planet_id' => 3
        ]);

        Spaceport::create([
            'name' => 'Red Horizon',
            'planet_id' => 4
        ]);

        Spaceport::create([
            'name' => 'Orbital',
            'planet_id' => 5
        ]);

        Spaceport::create([
            'name' => 'Ring Haven',
            'planet_id' => 6
        ]);


        Spaceport::create([
            'name' => 'Ring Gate',
            'planet_id' => 7
        ]);

        Spaceport::create([
            'name' => 'Photon',
            'planet_id' => 8
        ]);

        Spaceport::create([
            'name' => 'Abyssal',
            'planet_id' => 9
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaceports');
    }
};
