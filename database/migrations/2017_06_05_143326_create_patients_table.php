<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('episode_id')->unique();
            $table->string('service_group_id');
            $table->string('title');
            $table->string('language');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->date('DOB');
            $table->string('street');
            $table->string('postal_code');
            $table->string('city');
            $table->string('state');
            $table->string('country_code');
            $table->string('drivers_license');
            $table->string('ss');
            $table->string('phone_home');
            $table->string('status');
            $table->string('contact_relationship');
            $table->dateTime('date');
            $table->string('sex');
            $table->Integer('providerID');
            $table->string('ref_providerID');
            $table->string('email');
            $table->string('pubpid');
            $table->string('pid');
            $table->string('genericname1');
            $table->string('genericname2');
            $table->string('regdate');
            $table->string('guardiansname');
            $table->string('age');
            $table->string('user');
            $table->string('facility_id');
            $table->string('visittype');
            $table->string('doctor');
            $table->string('visit_status');
            $table->string('alcoholic');
            $table->string('blood_group');
            $table->string('obesity');
            $table->string('smoker');
            $table->string('dementia');
            $table->string('vision_impairment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('patients');
    }

}
