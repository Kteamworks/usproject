<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drg extends Model
{
    protected $table = 'drg';
    protected $fillable = [
        'title','description','drg_name', 'drg_active', 'cms_payout', 'alcohol', 'tobacco','obesity','dementia','vision_impairment'
    ];
}
