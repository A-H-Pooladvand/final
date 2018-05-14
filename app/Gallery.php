<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the owning gallery models.
     */
    public function gallery()
    {
        return $this->morphTo();
    }
}
