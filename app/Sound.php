<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the owning sounds models.
     */
    public function sound()
    {
        return $this->morphTo();
    }
}
