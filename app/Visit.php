<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * Get the member that owns the visit.
     */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
