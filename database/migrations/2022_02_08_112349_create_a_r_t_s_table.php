<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateARTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_r_t_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('client_id');
            $table->bigInteger('appointment_id');
            $table->string('next_refill');
            $table->string('drug_id');
            $table->string('status')->default('not filled');
            $table->bigInteger('refill_dose');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_r_t_s');
    }
}
