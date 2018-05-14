<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the owning video models.
     */
    public function video()
    {
        return $this->morphTo();
    }
}
