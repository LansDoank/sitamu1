<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';
    protected $fillable = ['fullname','institution', 'telephone', 'address', 'check_in', 'check_out', 'visitor_photo','objective', 'i_n_i', 'province_code', 'district_code', 'subdistrict_code', 'village_code'];
    protected $with = ['district','province','visitType','subdistrict','village'];

    public function visitType(): BelongsTo
    {
        return $this->belongsTo(VisitType::class,'visit_type_id','id');
    }

    public function province(): BelongsTo {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }


    public function district(): BelongsTo {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function subdistrict(): BelongsTo {
        return $this->belongsTo(SubDistrict::class,'subdistrict_code','code');
    }

    public function village(): BelongsTo {
        return $this->belongsTo(Village::class,'village_code','code');
    }
}
