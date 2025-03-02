<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldSchedules extends Command
{
    protected $signature = 'schedules:cleanup';
    protected $description = 'Törli azokat a menetrendeket, amelyek már befejeződtek';

    public function handle()
    {
        $deleted = Schedule::where('comes_back', '<', Carbon::now())->delete();

        $this->info("{$deleted} menetrend törölve.");
    }
}
