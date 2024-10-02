<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('log_userid');
            $table->string('appointment');
            $table->longText('desc');
            $table->string('art')->default('n/a');
            $table->string('viralload')->default('n/a');
            $table->string('adherance')->default('n/a');
            $table->string('tbtest')->default('n/a');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
