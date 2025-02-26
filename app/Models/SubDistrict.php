<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubDistrict extends Model
{

    protected $table = 'sub_districts';
    protected $fillable = ['name','code']; 
    // protected $with = ['visit','visitor'];

    public function visit(): HasMany {
        return $this->hasMany(VisitType::class,'sub_district_code','code');
    }

    public function visitor() :HasMany {
        return $this->hasMany(Visitor::class,'code', 'subdistrict_code');
    }
}
