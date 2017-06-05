<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrgServicesGrp extends Model
{
    protected $table = 'drg_services_grp';
    protected $fillable = [
        'sg_id','drgdescription','sg_name', 'sg_cost', 'sg_active','sg_label', 'cms_payout', 'alcohol', 'tobacco','obesity','dementia','vision_impairment'
    ];
}
