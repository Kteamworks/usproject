<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
        protected $table = 'admission_details';
        protected $dates = ['created_at','actual_discharge_date','admit_date', 'discharge_date','updated_at'];
    protected $fillable = [
        'pid','patient_episode_id','drg_name', 'patient_name', 'actual_discharge_date', 'user', 'authorized','activity','provider','admit_date', 'discharge_date','diagnosis','date_edited_by','reason_for_discharge','discharged_by','total_no_unit'
    ];
}
