<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrgProgress extends Model
{
    protected $table = 'drg_progress';
    protected $fillable = [
        'pid','episode_id','drg_id', 'service_id', 'units','service_date','service_status', 'service_cost', 'created_by', 'provider','authorized'
    ];
}
