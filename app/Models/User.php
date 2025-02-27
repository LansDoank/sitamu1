<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';
    protected $fillable = [
        'photo',
        'name',
        'username',
        'password',
        'province_code',
        'district_code',
        'sub_district_code',
        'village_code'
    ];

    // protected $with = ['roles'];

    protected $with = ['role','address','province','district','sub_district'];


    public function role() : BelongsTo{
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function province() : BelongsTo {
        return $this->belongsTo(Province::class,'province_code','code');
    }
    public function district() : BelongsTo {
        return $this->belongsTo(District::class,'district_code','code');
    }
    public function sub_district() : BelongsTo {
        return $this->belongsTo(SubDistrict::class,'sub_district_code','code');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_code', 'code');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
