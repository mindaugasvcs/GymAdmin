<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * Get the member that owns the payment.
     */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    /**
     * Get the user that accepted the payment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the membership that belongs to the payment.
     */
    public function membership()
    {
        return $this->hasOne('App\Membership');
    }
}
