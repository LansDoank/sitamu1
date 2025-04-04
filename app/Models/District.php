<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['code', 'province_code', 'name'];
    // protected $with = ['visit'];

    public function visit(): HasMany {
        return $this->hasMany(VisitType::class,'district_code','code');
    }
    public function visitor() :HasMany {
        return $this->hasMany(Visitor::class,'district_code', 'code');
    }
    public function user() :HasMany {
        return $this->hasMany(User::class,'district_code', 'code');
    }
}
