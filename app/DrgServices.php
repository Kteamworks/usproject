<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrgServices extends Model
{
    protected $table = 'drg_services';
    protected $fillable = [
        'service_name','service_description','service_group_id', 'service_name', 'budgetcost','active', 'service_id', 'created_by', 'provider'
    ];
}
