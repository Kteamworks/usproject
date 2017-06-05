<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrgServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drg_services', function (Blueprint $table) {
	$table->Increments('id');	
  $table->string('service_name');
$table->string('service_description');
 $table->Integer('service_group_id');
  $table->Integer('budgetcost');
  $table->string('taxrates');
  $table->Integer('active');
  $table->string('service_id');
  $table->string('created_by');
  $table->string('provider');
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
        Schema::dropIfExists('drg_services');
    }
}
