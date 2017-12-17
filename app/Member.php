<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * Get the payments for the member.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Get the visits for the member.
     */
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }
}
