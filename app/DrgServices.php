<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrgServices extends Model
{
    protected $table = 'drg_services';
    protected $fillable = [
        'service_id','drg_id','units', 'provider','created_by'
    ];
}
