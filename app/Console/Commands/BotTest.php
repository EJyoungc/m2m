<?php

namespace App\Console\Commands;

use App\Http\Controllers\TelegramBotController;
use App\Jobs\CheckCommands;
use Illuminate\Console\Command;


class TelegramPolling extends Command
{
    protected $signature = 'tel:poll';
    protected $description = 'Handle Telegram bot updates using long polling';
    
    protected $telegramService;

    public function __construct()
    {
       
    }

    public function handle()
    {
        $botController = new TelegramBotController();

        while (true) {
            $botController->handleRequest();
            // dump($botController->handleRequest());
            sleep(1); // Sleep for a second to prevent rapid polling
        }
    }
}