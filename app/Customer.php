<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dob',
        'mobilenumber', 
        'doj',
        'photo',
        'address',
        'email'
    ];

    public function subscription()
    {
        return $this->hasMany('App\Subscription');
    }
}
