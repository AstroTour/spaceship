<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\Planet;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->text('information');
            $table->timestamps();
        });

        Planet::create([
           'name' => 'Merkúr',
            'information' => 'A római szerelem és szépség istennőjéről van elnevezve. Az ókori időkben Vénuszt gyakran két különböző csillagnak tartották, az esti csillagnak és a reggeli csillagnak.'
        ]);

        Planet::create([
           'name' => 'Vénusz',
            'information' => 'A Naphoz legközelebbi bolygó. Gyorsabban kerüli meg a Napot, mint az összes többi bolygó, ezért nevezték el a rómaiak a gyors lábú hírnök istenükről.'
        ]);

        Planet::create([
           'name' => 'Föld',
            'iformation' => 'Föld, otthonunk. Ez az egyetlen bolygó, amelyről ismert, hogy légköre szabad oxigént tartalmaz, folyékony víz óceánjai találhatók a felszínén, és természetesen élet is létezik rajta.'
        ]);

        Planet::create([
           'name' => 'Mars',
            'information' => 'A Naphoz negyedik bolygó és a második legkisebb bolygó a Naprendszerben. A római háború istenéről van elnevezve, amelyet gyakran „Vörös Bolygóként” emlegetnek.'
        ]);

        Planet::create([
           'name' => 'Jupiter',
            'indormation' => 'A Jupiter a legnagyobb bolygó a Naprendszerben. Illően a római mitológia istenek királyáról nevezték el.'
        ]);

        Planet::create([
            'name' => 'Szaturnusz',
            'information' => 'A Szaturnusz a Naphoz hatodik bolygó és a második legnagyobb bolygó a Naprendszerben. A Szaturnusz a római neve Cronusnak, a Titánok urának.'
        ]);

        Planet::create([
           'name' => 'Uránusz',
            'information' => 'Az első bolygó, amelyet a tudósok felfedeztek. A bolygó különleges a drámai dőlésszöge miatt, amelynek következtében tengelye szinte közvetlenül a Nap felé mutat.'
        ]);

        Planet::create([
           'name' => 'Neptunusz',
           'information' => 'A Neptunusz a Naprendszer nyolcadik bolygója, és a legmesszebb eső gázóriás. Jellemzője a jellegzetes kék szín, amelyet a metán jelenléte ad, és erős szelei, amelyek a leggyorsabbak a bolygók között.'
        ]);

        Planet::create([
            'name' => 'Pluto',
            'information' => 'A Plútó, amelyet egykor a Naprendszer kilencedik és legmesszebb eső bolygójának tartottak, ma a legnagyobb ismert törpebolygó a Naprendszerben.'
        ]);

        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
