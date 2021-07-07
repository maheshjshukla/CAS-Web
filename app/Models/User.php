<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'gender',
        'age',
        'dob',
        'is_registered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['age'];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    /*public function setAgeAttribute($date)
    {
        $this->attributes['age'] = Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }*/

    public function getDobAttribute($date) {
        if (!empty($date))
            return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function setDobAttribute($date) {
        $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    /*public function scopeAgeWhere($query, $age, $operator = '=')
    {
        $query->where('age', $operator, $age);
    }*/
}
