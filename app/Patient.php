<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
 protected $table = 'patients';
    protected $fillable = [
        'episode_id','drg_id','title', 'language', 'fname','lname', 'mname', 'DOB', 'street','postal_code','city','state','country_code', 'drivers_license', 'ss','phone_home', 'status', 'contact_relationship', 'date','sex','providerID','ref_providerID','email','pubpid', 'pid', 'genericname1','genericname2', 'regdate', 'guardiansname', 'age','user','facility_id','visittype','doctor', 'visit_status', 'alcoholic','blood_group', 'obesity', 'smoker', 'dementia','vision_impairment'
    ];
}
