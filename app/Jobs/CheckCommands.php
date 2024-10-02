<?php

namespace App\Jobs;

use App\Http\Controllers\TelegramBotController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class CheckCommands implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
        // Artisan::call('tel:poll');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
    // Artisan::call('tel:poll');

    dd('hello');
    }
}
