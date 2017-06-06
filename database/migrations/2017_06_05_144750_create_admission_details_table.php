<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('admission_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->integer('patient_episode_id');
            $table->string('patient_name');
            $table->dateTime('actual_discharge_date');
            $table->string('user');
            $table->integer('authorized');
            $table->integer('activity');
            $table->string('provider');
            $table->dateTime('admit_date');
            $table->dateTime('discharge_date');
            $table->string('diagnosis');
            $table->dateTime('date_edited_by');
            $table->string('reason_for_discharge');
            $table->string('discharged_by');
            $table->integer('total_no_unit');
            $table->dateTime('create_date');
            $table->dateTime('update_date');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('admission_details');
    }

}
