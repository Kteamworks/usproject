<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrgProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('drg_progress', function (Blueprint $table) {
        $table->Integer('pid');	
	$table->string('drg_episode_id');
	$table->string('sg_id');
	$table->string('service_id');
	$table->DateTime('service_date');
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
    public function down()
    {
        //
    }
}
