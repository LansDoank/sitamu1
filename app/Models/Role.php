<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['name'];
    
    protected $with = ['user'];

    public function user() : HasMany {
        return $this->hasMany(User::class,'id','role_id');
    }
}
