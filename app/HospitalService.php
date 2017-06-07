<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalService extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'name','description','budget_cost', 'units','tax_rates','active'
    ];
}
