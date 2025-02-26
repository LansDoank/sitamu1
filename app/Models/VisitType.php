<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisitType extends Model
{

    protected $table ='visit_types';
    protected $fillable = ['qr_code','name','slug','province_code','district_code','sub_district_code','village_code'];
    protected $with = ['district','province','subdistrict','village'];

    public function province(): BelongsTo {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function district(): BelongsTo {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function subdistrict(): BelongsTo {
        return $this->belongsTo(SubDistrict::class,'sub_district_code','code');
    }

    public function village(): BelongsTo {
        return $this->belongsTo(Village::class,'village_code','code');
    }
}
