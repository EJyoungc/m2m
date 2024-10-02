<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Seeder;

class DrugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Drug::create(['name'=>'Atazanavir or ATV (Reyataz)']);
        Drug::create(['name'=>'Darunavir or DRV (Prezista)']);
        Drug::create(['name'=>'Fosamprenavir or FPV (Lexiva)']);
        Drug::create(['name'=>'Indinavir or IDV (Crixivan)']);
        Drug::create(['name'=>'Lopinavir + ritonavir, or LPV/r (Kaletra)']);
        Drug::create(['name'=>'Nelfinavir or NFV (Viracept)']);
    }
}
