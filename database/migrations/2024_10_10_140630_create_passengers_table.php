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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('birth_date');


            $table->foreignId('reservation_id')
                ->constrained('reservations')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreignId('spaceship_seat_id')
                ->constrained('spaceship_seats')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->text('secret_pass');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
