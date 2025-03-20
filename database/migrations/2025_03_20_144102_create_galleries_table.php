<?php

use App\Models\Gallery;
use GuzzleHttp\Promise\Create;
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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->timestamps();
        });

        Gallery::create([
            'img' => 'gallery/astro1.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro2.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro3.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro4.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro5.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro6.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro7.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro8.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro9.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro10.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro11.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro12.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro13.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro14.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro15.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro16.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro17.jpg'
        ]);

        Gallery::create([
            'img' => 'gallery/astro18.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
