<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrgProgress extends Model
{
    protected $fillable = [
        'pid','drg_episode_id','sg_id', 'service_id', 'service_date','service_status', 'service_cost', 'created_by', 'provider','authorized','units'
    ];
}
