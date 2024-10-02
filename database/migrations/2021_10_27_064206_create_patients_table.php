<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('hiv_status');
            $table->string('client_type');
            $table->string('dob');
            $table->string('sex');
            $table->string('m2m_enrol_date');
            $table->string('art_number');
            $table->string('art_init_date');
            $table->string('form_status')->default('incomplete');
            $table->string('partner')->default('n/a');
            $table->string('partner_status')->default('n/a');
            $table->string('acfu')->default('n/a');
            $table->string('acfu_type')->default('n/a');
            $table->string('acfu_method')->default('n/a');
            $table->string('tel')->default('n/a');
            $table->string('address')->default('n/a');
            $table->string('art_pick_up')->default('n/a');
            $table->string('viral_load')->default('n/a');
            $table->string('adherance')->default('n/a');
            $table->string('tb_screening')->default('n/a');
            $table->integer('chat_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
