<?php

use App\Models\Avatar;
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
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
        });

        Avatar::create([
            'image' => 'avatar/person.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/wolf.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/driver.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/ironman.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/deadpool.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/ufo.jpg'
        ]);

        Avatar::create([
            'image' => 'avatar/seal.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');
    }
};
