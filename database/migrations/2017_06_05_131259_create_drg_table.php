<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrgTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('drg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('drg_name');
            $table->string('description');
            $table->boolean('drg_active');
            $table->integer('cms_payout');
            $table->integer('alcohol');
            $table->integer('tobacco');
            $table->integer('obesity');
            $table->integer('dementia');
            $table->integer('vision_impairment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('drg_service_groups');
    }

}
