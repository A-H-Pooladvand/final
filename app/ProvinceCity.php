<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceCity extends Model
{
    protected $fillable = ['province_id', 'title'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
