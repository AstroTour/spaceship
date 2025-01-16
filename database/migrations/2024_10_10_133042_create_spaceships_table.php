<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Spaceship;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spaceships', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('information');
            $table->unsignedSmallInteger('capacity');
            $table->timestamps();
        });

        Spaceship::create([
            'name' => 'Odyssey',
            'information' => 'asdasdasdadasdadasddadadadada',
            'capacity' => 10
        ]);

        Spaceship::create([
            'name' => 'Origin',
            'information' => 'asdasdasdadasdadasddadadadadasjsi',
            'capacity' => 12
        ]);

        Spaceship::create([
            'name' => 'Nova',
            'information' => 'asdasdasdadasdadasddadadadadacisdco',
            'capacity' => 9
        ]);

        Spaceship::create([
            'name' => 'Chronos',
            'information' => 'asdasdasdadasdadasddadadadadasjsé',
            'capacity' => 12
        ]);

        Spaceship::create([
            'name' => 'Phantom',
            'information' => 'asdasdasdadasdadasddadadadadascoeforhoe',
            'capacity' => 10
        ]);

        Spaceship::create([
            'name' => 'Spectra',
            'information' => 'asdasdasdadasdadasddadadadadascoőgkrőg',
            'capacity' => 15
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaceships');
    }
};
