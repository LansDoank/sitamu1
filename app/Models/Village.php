<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Village extends Model
{
    protected $table = 'villages';
    protected $fillable = ['code','sub_districts_code','name'];
    // protected $with = ['visit','visitor'];

    // public function receptionist(): HasMany  {
    //     return $this->hasMany(User::class);
    // }

    public function visit(): HasMany {
        return $this->hasMany(VisitType::class,'village_code','code');
    }
    public function visitor() :HasMany {
        return $this->hasMany(Visitor::class,'village_code', 'code');
    }
}
