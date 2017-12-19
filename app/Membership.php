<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['title', 'limit_type', 'limit', 'amount'];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
