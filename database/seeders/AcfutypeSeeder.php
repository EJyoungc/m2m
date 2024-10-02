<?php

namespace Database\Seeders;

use App\Models\Acfutype;
use Illuminate\Database\Seeder;

class AcfutypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Acfutype::create([
            'name'=>'sms'
        ]);
        Acfutype::create([
            'name'=>'phone'
        ]);
        Acfutype::create([
            'name'=>'Home Visit'
        ]);        
    }
}
