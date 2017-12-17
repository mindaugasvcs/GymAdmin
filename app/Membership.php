<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function payments()
    {
        return $this->belongsToMany('App\Payment');
    }
}
