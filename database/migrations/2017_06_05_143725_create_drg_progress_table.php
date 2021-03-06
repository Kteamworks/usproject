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
    public function up() {
        Schema::create('drg_progress', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('episode_id');
            $table->string('drg_id');
            $table->string('service_id');
            $table->integer('units');
            $table->dateTime('service_date');
            $table->integer('service_status');
            $table->integer('actual_cost');
            $table->integer('authorized');
            $table->string('provider');
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         