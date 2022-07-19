<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use BeyondCode\Vouchers\Traits\CanRedeemVouchers;
use Tymon\JWTAuth\Contracts\JWTSubject;


use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable implements JWTSubject
{

    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'password', 'role','lat','lng','address','fcm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deliveryboy(){
        return $this->hasOne(DeliveryBoy::class,'user_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }
    public function orders(){
        return $this->hasMany(Order::class, 'user_id')
            ->where('is_paid', '=','1');
    }

    public function rewards(){
        return $this->hasOne(Reward::class,'user_id');
    }
}
