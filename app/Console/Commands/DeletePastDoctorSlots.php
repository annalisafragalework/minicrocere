<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DoctorSlot;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;

class DeletePastDoctorSlots extends Command
{
    protected $signature = 'slots:cleanup';
    protected $description = 'Cancella gli slot dei dottori con data passata';

    public function handle()
    {
        $today = Carbon::today();
        $count = DoctorSlot::where('date', '<', $today)->delete();
        $this->info("$count slot eliminati.");
    }
}

