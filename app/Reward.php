<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $table = 'reward_points';
    protected $fillable = [
        'points',
        'user_id'
    ];


    public $timestamps = true;


    public function user(){
        return $this->hasone(User::class,'id');
    }






}
