<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER `update_schedule_condition`
            BEFORE UPDATE ON `schedules`
            FOR EACH ROW
            BEGIN
                IF NEW.`departure_time` <= NOW() THEN
                    SET NEW.`condition` = "utazik";
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_schedule_condition;');
    }
};
