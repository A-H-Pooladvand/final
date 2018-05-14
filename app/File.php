<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the owning file models.
     */
    public function file()
    {
        return $this->morphTo();
    }
}
