<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrgServiceGroupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('drg_service_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('description');
            $table->string('sg_name');
            $table->Integer('sg_cost');
            $table->Integer('sg_active');
            $table->string('sg_label');
            $table->Integer('cms_payout');
            $table->Integer('alcohol');
            $table->Integer('tobacco');
            $table->Integer('obesity');
            $table->Integer('dementia');
            $table->Integer('vision_impairment');
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
