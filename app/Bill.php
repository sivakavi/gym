<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amt_paid', 'subscription_id'
    ];
    
    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }
}
