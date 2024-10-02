<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Schedule::call('app:daily-appointment')->everySecond();

Schedule::command('tel:poll',)->everySecond();
// Artisan::command('check', function () {



// })->everyTenSeconds();
