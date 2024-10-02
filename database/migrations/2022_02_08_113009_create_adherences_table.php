<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('adherence_result');
            $table->bigInteger('appointment_id');
            $table->bigInteger('pills_missed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adherences');
    }
}
