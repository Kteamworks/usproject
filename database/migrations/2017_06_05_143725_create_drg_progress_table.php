<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrgProgressTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('drg_progress', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('pid');
            $table->string('patient_episode_id');
            $table->string('service_group_id');
            $table->string('service_id');
            $table->dateTime('service_date');
            $table->Integer('service_status');
            $table->Integer('service_cost');
            $table->Integer('authorized');
            $table->string('provider');
            $table->Integer('units');
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
        Schema::dropIfExists('drg_progress');
    }
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           