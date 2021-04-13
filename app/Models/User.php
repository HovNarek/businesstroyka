<?php

namespace App\Models;

use App\Models\Admin\City;
use App\Models\Admin\Specialization;
use App\Models\Admin\Status;
use App\Models\Admin\UserIp;
use App\Models\Admin\UserPhone;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type',
        'email',
        'password',
        'gender',
        'name',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function phones() {
        return $this->hasMany(UserPhone::class);
    }

    public function ips() {
        return $this->hasMany(UserIp::class);
    }

    public function isOnline() {
        return Cache::has('user-is-online-' . $this->id);
    }
}
