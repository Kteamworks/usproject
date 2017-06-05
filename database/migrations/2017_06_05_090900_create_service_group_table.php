<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drg_services_grp', function (Blueprint $table) {
$table->Integer('sg_id');
$table->string('drgdescription');
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
    public function down()
    {
        //
    }
}
